<?php

namespace Theater\Http\Controllers\admin;

use Validator;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use phpDocumentor\Reflection\Types\Integer;
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

    public function colonUsers(){
        $users = $this->getUsers(1);
        return view('back.colonUsers', compact('users'));
    }

    public function semanaUsers(){
        $users = $this->getUsers(2);
        return view('back.semanaUsers', compact('users'));
    }
    
    public function semanaEditUser($id){
        $user = Organization::with(['awards'])->find($id);
        return view('back.semanaEditUser', compact('user'));
    }

    public function colonEditUser($id){
        $user = Organization::with(['awards'])->find($id);
        return view('back.colonEditUser', compact('user'));
    }

    public function semanaUpdate(Request $request, $id){
        $inputs = $request->all();
        $validate = Validator::make($inputs, Validation::getSemanaRules());

        if($validate->fails())
            return redirect()->back()->withErrors($validate)->withInput();

        $org = Organization::find($id);
        UserManagement::updateSemana($org, $inputs);
        return redirect()->route('semanaUsers')->with(['Success' => 'La inscripción se ha actualizado satisfactoriamente.']);
    }

    public function colonUpdate(Request $request, $id){
        $inputs = $request->all();
        $validate = Validator::make($inputs, Validation::getColonRules());
        if($validate->fails())
            return redirect()->back()->withErrors($validate)->withInput();

        $org = Organization::find($id);
        UserManagement::updateColon($org, $inputs);
        return redirect()->route('colonUsers')->with(['Success' => 'La inscripción se ha actualizado satisfactoriamente.']);;
    }

    private function getUsers($type){
        return Organization::whereHas('user', function($query){
            $query->select('id')->where('role_id', 2);
        })->whereHas('awards', function($query) use($type){
            $query->where('award_type_id', $type);
        })->with(['user', 'awards'])->paginate(20);
    }
}
