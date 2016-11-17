<?php

namespace Theater\Http\Controllers;

use Illuminate\Http\Request;
use Theater\Entities\City;
use Theater\Http\Services\UserManagement;
use Theater\Http\Services\Validation;
use Validator;

class ColonController extends Controller
{
    public function index(){
        foreach (auth()->user()->awards as $awd){
            if($awd['award_type_id'] == 1) {
                if ($awd['state'] == 1)
                    return redirect()->route('choose');
                else
                    $award = $awd;
            }
        }

        $organization = isset($award) ? $award->organization : null;
        $propietor = isset($award) ? $award->propietor : null;
        $production = isset($award) ? $award->production : null;
        $cities = City::orderBy('name')->get();
        return view('front.colon', compact('organization', 'award', 'propietor', 'production', 'cities'));
    }
    
    public function create(Request $request){
        $inputs = $request->all();
        $validate = Validator::make($inputs, Validation::getColonRules());
        $message = isset($inputs['isUpdate']) 
                 ? 'El formulario se ha guardado con exito'
                 : 'Se ha inscrito al PREMIO TEATRO COLÓN con exito.';
        
        if($validate->fails() && !isset($inputs['isUpdate']))
            return redirect()->back()->withErrors($validate)->withInput()->with(['Error' => 'Debe llenar los campos obligatorios']);
        
        UserManagement::insertColon(auth()->user(), $inputs);
        return redirect()->route('choose')->with(['Success' => $message]);
    }
}
