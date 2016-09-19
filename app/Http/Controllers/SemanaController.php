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

    private function sendSemana($inputs){

        $org = auth()->user()->organization;
        $org->update([
            'name' => $inputs['org_name'],
            'city' => $inputs['org_city'],
            'address' => $inputs['org_address'],
            'phone' => $inputs['org_phone'],
            'mobile' => $inputs['org_mobile'],
            'email' => $inputs['org_email'],
            'website' => $inputs['org_website'],
            'socials' => ',,',
        ]);

        $prd = Production::create([
            'name' => $inputs['prd_name'],
            'genre' => $inputs['prd_genre'],
        ]);

        $propietor = [
            'name' => $inputs['rep_name'],
            'last_name' => $inputs['rep_last_name'],
            'document_type_id' => $inputs['rep_doc_typ'],
            'document_number' => $inputs['rep_doc_number'],
            'mobile' => $inputs['rep_mobile'],
            'email1' => $inputs['rep_email'],
            'email2' => $inputs['rep_email2'],
            'organization_id' => $org->id
        ];

        $awd = Award::create([
            'award_type_id' => 2,
            'production_id' => $prd->id
        ]);

        $org->awards()->attach($awd->id);
        $org->propietor ? $org->propietor->update($propietor) : Propietor::create($propietor);

        foreach ($inputs as $key => $file){
            if(strpos($key, 'type') !== false){
                $fileName = explode('/temp/', $file)[1];
                rename(base_path('public' . $file), base_path('public/uploads/semana/' . $fileName));
                $type = explode('type', $key)[1];

                File::create([
                    'name' => $fileName,
                    'file_type_id' => $type,
                    'award_id' => $awd->id
                ]);
            }
        }
    }
}
