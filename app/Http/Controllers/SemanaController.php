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
        foreach (auth()->user()->awards as $awd){
            if($awd['award_type_id'] == 2){
                if($awd['state'] == 1)
                    return redirect()->route('choose');
                else
                    $award = $awd;
            }
        }

        $organization = isset($award) ? $award->organization : null;
        $propietor = isset($award) ? $award->propietor : null;
        $production = isset($award) ? $award->production : null;
        return view('front.semana', compact('organization', 'award', 'propietor', 'production'));
    }

    public function create(Request $request){
        $inputs = $request->all();
        $validate = Validator::make($inputs, Validation::getSemanaRules());
        $message = isset($inputs['isUpdate'])
            ? 'El formulario se ha guardado con exito'
            : 'Se ha inscrito al PREMIO TEATRO COLÓN con exito.';

        if($validate->fails() && !isset($inputs['isUpdate']))
            return redirect()->back()->withErrors($validate)->withInput()->with(['Error' => 'Debe llenar los campos obligatorios']);

        UserManagement::insertSemana(auth()->user() ,$inputs);
        return redirect()->route('choose')->with(['Success' => $message]);
    }
}
