<?php

namespace Theater\Http\Controllers;

use Directory\Entities\Country;
use Directory\Entities\Sector;
use Illuminate\Http\Request;

use Directory\Http\Requests;
use Theater\User;

class HomeController extends Controller
{
    function index(){
        return view('front.home');
    }

    function getProfile(){
        return view('back.profile');
    }

    function postProfile(Request $request){
        $inputs = $request->all();
        $user = auth()->user();
        if(!strlen($inputs['password']) || password_verify($inputs['password'], $user->password))
            unset($inputs['password']);
        else
            $inputs['password'] = bcrypt($inputs['password']);

        if(User::where('email', $inputs['email'])->first())
            unset($inputs['email']);

        $user->update($inputs);
        return redirect()->to('/')->with('Success', '!El usuario ha sido actualizado satisfactoriamente!');
    }

    function chooseForm(){
        $awards = auth()->user()->awards;
        $event = [0 , 0];

        foreach ($awards as $award){
            if($award['state'] == 1){
                if($award['award_type_id'] == 1)
                    $event[0] = 1;
                else
                    $event[1] = 1;
            }
        }

        return view('front.formsMenu', compact('event'));
    }
}
