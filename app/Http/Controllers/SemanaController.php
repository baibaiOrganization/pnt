<?php

namespace Theater\Http\Controllers;


use Theater\Http\Services\UserManagement;
use Validator;
use Illuminate\Http\Request;
use Theater\Http\Services\Validation;

use Theater\Entities\Production;
use Theater\Entities\Propietor;
use Theater\Entities\Award;
use Theater\Entities\File;

class SemanaController extends Controller
{
    public function index(){
        $awards = auth()->user()->organization->awards;

        foreach ($awards as $award){
            if($award['award_type_id'] == 2)
                return redirect()->route('choose');
        }

        return view('front.semana');
    }

    public function create(Request $request){
        $inputs = $request->all();
        $validate = Validator::make($inputs, Validation::getSemanaRules());

        if($validate->fails())
            return redirect()->back()->withErrors($validate)->withInput();

        UserManagement::insertSemana(auth()->user()->organization, $inputs);
        return redirect()->route('choose')->with(['Success' => 'Se ha inscrito al PREMIO SEMANA con exito.']);
    }
}
