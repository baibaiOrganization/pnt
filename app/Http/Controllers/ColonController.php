<?php

namespace Theater\Http\Controllers;

use Illuminate\Http\Request;
use Theater\Http\Services\Validation;
use Validator;

use Theater\Entities\Award;
use Theater\Entities\File;
use Theater\Entities\Production;
use Theater\Entities\Propietor;

class ColonController extends Controller
{
    public function index(){
        $awards = auth()->user()->organization->awards;

        foreach ($awards as $award){
            if($award['award_type_id'] == 1)
                return redirect()->route('choose');
        }

        return view('front.colon');
    }
    
    public function create(Request $request){
        $inputs = $request->all();
        $validate = Validator::make($inputs, Validation::getColonRules());

        if($validate->fails())
            return redirect()->back()->withErrors($validate)->withInput();

        $this->sendColon($inputs);   
        return redirect()->route('choose')->with(['Success' => 'Se ha inscrito al PREMIO TEATRO COLÓN con exito.']);
    }

    private function sendColon($inputs)
    {

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

        $propietor = [
            'name' => $inputs['rep_name'],
            'last_name' => $inputs['rep_last_name'],
            'document_type_id' => $inputs['rep_doc_typ'],
            'document_number' => $inputs['rep_doc_number'],
            'mobile' => $inputs['rep_mobile'],
            'email1' => $inputs['rep_email1'],
            'email2' => $inputs['rep_email2'],
            'organization_id' => $org->id
        ];
        
        $org->propietor ? $org->propietor->update($propietor) : Propietor::create($propietor);
        
        $awd = Award::create([
            'award_type_id' => 1,
            'production_id' => $prd->id
        ]);

        $org->awards()->attach($awd->id);

        foreach ($inputs as $key => $file){
            if(strpos($key, 'type') !== false){
                $fileName = explode('/temp/', $file)[1];
                rename(base_path('public' . $file), base_path('public/uploads/colon/' . $fileName));
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
