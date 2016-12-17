<?php

namespace Theater\Http\Controllers\admin;

use Illuminate\Http\Request;
use Theater\Entities\Award;
use Theater\Entities\Category;
use Theater\Entities\Region;
use Theater\Http\Requests;
use Theater\Http\Controllers\Controller;

class QualificationController extends Controller
{
    /*************** JUEZ ***************/

    function userSelectedList(){
        $awards = Award::where('isSelected', 1)->paginate(20);
        $isEditable = $awards[0]->isSelEdit == 0 ? 1 : 0;
        return view('admin.userSelectedList', compact('awards', 'isEditable'));
    }


    function getSelectedSemana(){
        $awards = Award::where('isSelected', 1)->orderBy('region_id')->get();
        $regions = Region::where('id', '<>', 1)->get();
        $categories = Category::all();
        return view('admin.getSelectedSemana', compact('awards', 'regions', 'categories'));
    }


    /************* CURADOR *************/

    function sendToJudge(){
        $region_id = auth()->user()->region_id;
        $limit = $region_id == 2 ? 6 : 3;
        $awards = Award::where('isSelected', 1)->whereHas('organization', function($query) use ($region_id){
            $query->whereHas('city', function($query) use ($region_id){
                $query->where('region_id', $region_id);
            });
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
                    $query->whereHas('city', function($query) use($region){
                        $query->where('region_id', $region);
                    });
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
