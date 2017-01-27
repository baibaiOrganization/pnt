<?php

namespace Theater\Http\Controllers\admin;

use Theater\Entities\Award;
use Theater\Entities\City;
use Theater\Entities\Category;
use Theater\Entities\Region;
use Theater\Entities\Score;
use Theater\User;
use Validator;
use Illuminate\Http\Request;

use Theater\Entities\Organization;
use Theater\Http\Requests;
use Theater\Http\Controllers\Controller;
use Theater\Http\Services\Validation;
use Theater\Http\Services\UserManagement;

class UserController extends Controller
{

    public function index(){
        return view('back.choose');
    }

    public function generateExcel(Request $request, $type){
        shell_exec("cd " . $_SERVER['DOCUMENT_ROOT'] . "; cd ..; php artisan download:excel " . $type . " " . $request->get('email') . " > /dev/null &");
        return redirect()->back()->with(['Success' => 'El Excel está siendo generado, se enviará el link a su email.']);
    }

    public function searchUser(Request $request, $type){
        $search = $request->get('search');
        $awards = !$search
            ? $this->getUsers($type)
            : $this->getSearchUsers($type, $search);

        if($type == 1)
            return view('back.colonUsers', compact('awards'));
        return view('back.semanaUsers', compact('awards'));
    }

    public function colonUsers(){
        if(auth()->user()->id != 1){
            $awards = $this->getUsers(1);
            return view('back.colonUsers', compact('awards'));
        } else {
            $awards = Award::whereHas('user', function($query){
                $query->where('state', 1);
            })->where('award_type_id', 1)
            ->with('organization');

            $isEditable = $awards->first() ? $awards->first()->isSelEdit : 0;
            $awards = $awards->paginate(20);
            return view('admin.judgeSelectedColon', compact('awards', 'isEditable'));
        }
    }

    public function semanaUsers(){
        if(auth()->user()->role_id != 1) {
            $awards = $this->getUsers(2, auth()->user()->region_id);
            $isEditable = $awards[0] ? $awards[0]->isSelEdit : 1;
            return view('back.semanaUsers', compact('awards', 'isEditable'));
        } else {
            $awards = Award::where('isSelected', 1)->where('award_type_id', 2)->with(['scores'])->get();
            $users = User::where('role_id', 2)->with('awards')->paginate(20);
            $categories = Category::all();
            $arrayScores = [];

            foreach ($categories as $category) {
                foreach ($awards as $award) {
                    $temp = [
                        'category' => $category->id,
                        'award' => $award->id
                    ];

                    $sum = 0;
                    $scores = Score::where('category_id', $category->id)->where('award_id', $award->id)->get();
                    foreach($scores as $score){
                        $sum += $score->score;
                        array_push($temp, ['user' => $score->user_id, 'value' => $score->score]);
                    }

                    $temp['total'] = $sum ? $sum / 3 : 0;
                    array_push($arrayScores, $temp);
                }
            }

            arsort($arrayScores);

            $regions = Region::where('id', '<>', 1)->get();
            $judges = User::where('role_id', 5)->get();
            return view('admin.getSelectedSemana', compact('awards', 'regions', 'categories', 'judges', 'users'));
        }
    }
    
    public function semanaEditUser($id){
        $award = Award::with(['organization', 'files'])->find($id);
        $regions = Region::where('id', '<>', 1)->orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        return view('back.semanaEditUser', compact('award', 'regions', 'cities'));
    }

    public function colonEditUser($id){
        $award = Award::with('organization')->find($id);
        $regions = Region::orderBy('name')->get();
        return view('back.colonEditUser', compact('award', 'regions'));
    }

    public function semanaUpdate(Request $request, $id){
        $inputs = $request->all();
        $validate = Validator::make($inputs, Validation::getSemanaRules());

        if($validate->fails())
            return redirect()->back()->withErrors($validate)->withInput();

        $award = Award::find($id);
        UserManagement::updateSemana($award, $inputs);
        return redirect()->route('semanaUsers')->with(['Success' => 'La inscripción se ha actualizado satisfactoriamente.']);
    }

    public function colonUpdate(Request $request, $id){
        $inputs = $request->all();
        $validate = Validator::make($inputs, Validation::getColonRules());
        if($validate->fails())
            return redirect()->back()->withErrors($validate)->withInput();

        $award = Award::find($id);
        UserManagement::updateColon($award, $inputs);
        return redirect()->route('colonUsers')->with(['Success' => 'La inscripción se ha actualizado satisfactoriamente.']);;
    }

    private function getUsers($type, $region = null){
        return Award::whereHas('user', function($query){
            $query->where('state', 1);
        })->where('award_type_id', $type)
          ->whereHas('organization' , function($query) use($region){
              if($region > 1)
                  $query->where('region_id', $region);
        })->with('organization')
          ->orderBy('isSelected', 'DESC')
          ->orderBy('isPreselected', 'DESC')
          ->paginate(20);
    }

    private function getSearchUsers($type, $search){
        return Award::where([
            ['award_type_id', $type],
            ['state', 1]
        ])->whereHas('user', function($q) use($search, $type){
            $q->where('users.email', 'like', '%' . $search . '%');
        })->orWhereHas('organization', function($q) use($search, $type){
            $q->where('organizations.name', 'like', '%' . $search . '%');
        })->with(['user', 'organization'])->paginate(20);
    }
}
