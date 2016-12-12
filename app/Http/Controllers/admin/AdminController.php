<?php

namespace Theater\Http\Controllers\admin;

use Validator;
use Illuminate\Http\Request;
use Theater\Entities\Region;
use Theater\Entities\Role;
use Theater\Http\Controllers\Controller;
use Theater\User;

class AdminController extends Controller
{
    public function index(){
        $users = User::whereIn('role_id', [1,3,4,5])->orderBy('name')->paginate(20);
        return view('admin.usersList', compact('users'));
    }

    public function add(){
        $regions = Region::all();
        $roles = Role::whereIn('id', [1,3,4,5])->get();
        return view('admin.createUser', compact('regions', 'roles'));
    }

    public function create(Request $request){
        $inputs = $request->all();
        $validate = $this->validator($inputs);
        if($validate->fails())
            return redirect()->back()->withErrors($validate)->withInput()->with('Error', 'hubo un error');
        $inputs['password'] = bcrypt($inputs['password']);
        User::create($inputs);
        return redirect()->route('admin.usersList')->with('Success', '¡El usuario ha sido creado!');
    }

    public function edit($id){
        $user = User::find($id);
        $regions = Region::all();
        $roles = Role::whereIn('id', [1,3,4,5])->get();
        return view('admin.updateUser', compact('user', 'regions', 'roles'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $inputs = $request->all();

        if(isset($inputs['password']))
            $inputs['password'] = bcrypt($inputs['password']);

        $user->update($inputs);
        return redirect()->route('admin.usersList')->with('Success', '¡El usuario ha sido actualizado!');
    }

    private function validator($inputs){
        return Validator::make($inputs, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required',
            'region_id' => 'required'
        ]);
    }
}
