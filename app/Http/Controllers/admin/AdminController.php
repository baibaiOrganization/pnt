<?php

namespace Theater\Http\Controllers\admin;

use Illuminate\Http\Request;

use Theater\Entities\Region;
use Theater\Entities\Role;
use Theater\Http\Controllers\Controller;
use Theater\User;

class AdminController extends Controller
{
    public function index(){
        $users = User::whereIn('role_id', [1,3])->paginate(10);
        return view('admin.usersList', compact('users'));
    }

    public function add(){
        return view('admin.createUser', compact('users'));
    }

    public function create(Request $request){
        User::create($request->all());
        return redirect()->route('admin.usersList')->with('Success', '¡El usuario ha sido creado!');
    }

    public function edit($id){
        $user = User::find($id);
        $regions = Region::all();
        $roles = Role::whereIn('id', [1,3])->get();
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
}
