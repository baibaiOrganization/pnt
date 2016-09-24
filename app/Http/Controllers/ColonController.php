<?php

namespace Theater\Http\Controllers;

use Illuminate\Http\Request;
use Theater\Http\Services\UserManagement;
use Theater\Http\Services\Validation;
use Validator;

class ColonController extends Controller
{
    public function index(){
        $awards = auth()->user()->organization->awards;

        foreach ($awards as $award){
            if($award['award_type_id'] == 1 && $award['state'] == 1)
                return redirect()->route('choose');
        }

        return view('front.colon');
    }
    
    public function create(Request $request){
        $inputs = $request->all();
        $validate = Validator::make($inputs, Validation::getColonRules());

        if($validate->fails() && !isset($inputs['isUpdate']))
            return redirect()->back()->withErrors($validate)->withInput();

        UserManagement::insertColon(auth()->user()->organization , $inputs);
        return redirect()->route('choose')->with(['Success' => 'Se ha inscrito al PREMIO TEATRO COLÓN con exito.']);
    }
}
