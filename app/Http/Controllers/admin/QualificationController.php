<?php

namespace Theater\Http\Controllers\admin;

use Illuminate\Http\Request;
use Validator;
use Theater\Entities\Award;
use Theater\Entities\Category;
use Theater\Entities\Region;
use Theater\Entities\Score;
use Theater\Http\Requests;
use Theater\Http\Controllers\Controller;

class QualificationController extends Controller
{
    /*************** JUEZ ***************/

    function judgeSelectedSemana(){
        $awards = Award::where('isSelected', 1)
        ->where('award_type_id', 2)
        ->orderBy('region_id')
        ->with(['scores' => function($q){
            $q->where('user_id', auth()->user()->id);
        }])->get();

        $regions = Region::where('id', '<>', 1)->get();
        $categories = Category::where('id', '<>', 11)->get();
        return view('admin.judgeSelectedSemana', compact('awards', 'regions', 'categories'));
    }

    function judgeSelectedColon(){

        $awards = Award::whereHas('user', function($query){
            $query->where('state', 1);
        })->where('award_type_id', 1)
        ->with('organization');

        $isEditable = $awards->first()->isSelEdit;
        $awards = $awards->paginate(20);
        return view('admin.judgeSelectedColon', compact('awards', 'isEditable'));
    }

    function colonIsNotEditable(){

        $awards = Award::where('award_type_id', 1)->get();

        foreach($awards as $award){
            $award->update(['isSelEdit' => 0]);
        }

        return ['success' => true];
    }

    function colonSaveScore(Request $request){
        $flag = $request->get('isSelected') == 'true' ? 1 : 0;
        $award = $request->get('award');
        $user = $request->get('user');

        $score = Score::where('category_id', 11)->where('award_id', $award)->where('user_id', $user);
        if($score->first()){
            $score->delete();
        } else {
            Score::create([
                'score' => $flag,
                'category_id' => 11,
                'award_id' => $award,
                'user_id' => $user,
                'isEditable' => 1
            ]);
        }

        return ['success' => true];
    }



    function userSelectedList(){
        $awards = Award::where('isSelected', 1)->paginate(20);
        $isEditable = $awards[0]->isSelEdit == 0 ? 1 : 0;
        return view('admin.userSelectedList', compact('awards', 'isEditable'));
    }


    function getSelectedSemana(){
        $awards = Award::where('isSelected', 1)->orderBy('region_id')->get();
        $regions = Region::where('id', '<>', 1)->get();
        $categories = Category::where('id', '<>', 11)->get();
        return view('admin.getSelectedSemana', compact('awards', 'regions', 'categories'));
    }

    function semanaSaveScore(Request $request){
        $scores = $request->get('categories');
        $award = $request->get('award');
        $user = auth()->user()->id;

        if(in_array('', $scores))
            return ['error' => 'Antes de continuar debe llenar todos los campos'];

        foreach ($scores as $category => $score){

            Score::where('category_id', $category)->where('award_id', $award)->where('user_id', $user)->delete();
            Score::create([
                'score' => $score,
                'category_id' => $category,
                'award_id' => $award,
                'user_id' => $user,
                'isEditable' => 1
            ]);
        }

        return ['success' => true];
    }


    /************* CURADOR *************/

    function sendToJudge(){
        $region_id = auth()->user()->region_id;
        $limit = $region_id == 2 ? 6 : 3;
        $awards = Award::where('isSelected', 1)->whereHas('organization', function($query) use ($region_id){
            $query->where('region_id', $region_id);
        })->get();

        if(count($awards) != $limit)
            return ['error' => true, 'message' => "No fue posible enviar al juez. Debe seleccionar {$limit} participantes."];


        foreach ($awards as $key => $award){
            $award->update(['isSelEdit' => 0]);
        }
        return $awards;
    }


    function selectedUpdate(Request $request){

        $user = auth()->user();
        $region = $user->region->id;
        $limit = $region == 2 ? 6 : 3;
        $column = $user->role_id == 3 ? 'isSelected' : 'isPreselected';
        $state = $request->get('isSelected') == 'true' ? 1 : 0;

        $nAwards = Award::whereHas('user', function($query){
            $query->where('state', 1);
        })->whereRaw('award_type_id = 2 and ' . $column . ' = 1')
            ->whereHas('organization' , function($query) use($region){
                if($region > 1)
                    $query->where('region_id', $region);
            })->count();

        if($nAwards >= $limit && $state == 1)
            return ['error' => true, 'message' => "¡Ya ha seleccionado {$limit} usuarios!"];

        $award = Award::find($request->get('award_id'));

        if(!$award->isSelEdit)
            return ['error' => true, 'message' => 'El formulario ya no es editable!'];

        $award->update(["$column" => $state]);
        return $award;
    }
}
