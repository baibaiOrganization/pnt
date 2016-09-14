<?php

namespace Theater\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use Theater\Entities\Award;
use Theater\Entities\File;
use Theater\Entities\Production;
use Theater\Entities\Propietor;

class ColonController extends Controller
{

    private function validator($inputs, $rules){
        return Validator::make($inputs, $rules);
    }
    
    public function index(){
        return view('front.colon');
    }
    
    public function create(Request $request){
        $inputs = $request->all();
        $validate = $this->validator($inputs, $this->getColonRules());

        if($validate->fails())
            return redirect()->back()->withErrors($validate)->withInput();

        $this->sendColon($inputs);   
        return redirect()->route('choose')->with(['Success' => 'Se ha inscrito al PREMIO TEATRO COLÓN con exito.']);
    }


    private function sendColon($inputs){

        $org = auth()->user()->organization;
        $org->update([
            'name' => $inputs['org_name'],
            'city' => $inputs['org_city'],
            'address' => $inputs['org_address'],
            'phone' => $inputs['org_phone'],
            'mobile' => $inputs['org_mobile'],
            'email' => $inputs['org_email'],
            'website' => $inputs['org_website'],
            'socials' => $inputs['facebook'] . ',' . $inputs['instagram'] . ',' . $inputs['twitter'],
        ]);

        $prd = Production::create([
            'name' => $inputs['prd_name'],
            'release_date' => $inputs['prd_date'],
            'genre' => $inputs['prd_genre'],
            'link_video' => $inputs['prd_video'],
        ]);

        Propietor::create([
            'name' => $inputs['rep_name'],
            'last_name' => $inputs['rep_last_name'],
            'document_type_id' => $inputs['rep_doc_typ'],
            'document_number' => $inputs['rep_doc_number'],
            'mobile' => $inputs['rep_mobile'],
            'email1' => $inputs['rep_email1'],
            'email2' => $inputs['rep_email2'],
        ]);

        Award::create([
            'award_type_id' => 1,
            'production_id' => $prd->id
        ]);

        foreach ($inputs as $key => $file){
            if(strpos($key, 'type') !== false){
                $fileName = explode('/temp/', $file)[1];
                rename(base_path('public' . $file), base_path('public/uploads/colon/' . $fileName));
                $type = explode('type', $key)[1];

                File::create([
                    'name' => $fileName,
                    'file_type_id' => $type,
                    'organization_id' => $org->id
                ]);
            }
        }
    }

    private function getColonRules(){
        return [
            'org_name' => 'required',
            'org_city' => 'required',
            'org_address' => 'required',
            'org_phone' => 'required|numeric',
            'org_mobile' => 'required|numeric',
            'org_email' => 'required|email',
            'org_website' => 'required',

            'prd_name' => 'required',
            'prd_date' => 'required',
            'prd_genre' => 'required',
            'prd_video' => 'required',

            'rep_name' => 'required',
            'rep_last_name' => 'required',
            'rep_doc_typ' => 'required',
            'rep_doc_number' => 'required',
            'rep_mobile' => 'required',
            'rep_email1' => 'required',

            'type1' => 'required',
            'type2' => 'required',
            'type3' => 'required',
            'type4' => 'required',
            'type5' => 'required',
            'type6' => 'required',
            'type7' => 'required',
        ];
    }
}
