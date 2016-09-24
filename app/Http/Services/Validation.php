<?php

namespace Theater\Http\Services;

class Validation {
    
    public static function getSemanaRules(){
        return [
            'org_name' => 'required',
            'org_city' => 'required',
            'org_address' => 'required',
            'org_phone' => 'required|numeric',
            'org_mobile' => 'required|numeric',
            'org_email' => 'required|email',

            'prd_name' => 'required',
            'prd_genre' => 'required',

            'rep_name' => 'required',
            'rep_last_name' => 'required',
            'rep_doc_typ' => 'not_in:1',
            'rep_doc_number' => 'required|numeric',
            'rep_mobile' => 'required|numeric',
            'rep_email' => 'required|email',

            'type1' => 'required',
            'type2' => 'required',
            'type3' => 'required',
            'type5' => 'required',
            'type7' => 'required',
            'type8' => 'required',
            'type9' => 'required',
            'type10' => 'required',
            'type11' => 'required',
            'type12' => 'required',
            'type13' => 'required',
            'type14' => 'required',
            'type15' => 'required',
            'type16' => 'required',
            'type17' => 'required',
            'type18' => 'required',
            'type19' => 'required',
        ];
    }

    public static function getColonRules(){
        return [
            'org_name' => 'required',
            'org_city' => 'required',
            'org_address' => 'required',
            'org_phone' => 'required|numeric',
            'org_mobile' => 'required|numeric',
            'org_email' => 'required|email',

            'prd_name' => 'required',
            'prd_date' => 'required',
            'prd_genre' => 'required',
            'prd_video' => 'required',

            'rep_name' => 'required',
            'rep_last_name' => 'required',
            'rep_doc_typ' => 'required|not_in:1',
            'rep_doc_number' => 'required|numeric',
            'rep_mobile' => 'required|numeric',
            'rep_email1' => 'required|email',

            'type1' => 'required',
            'type2' => 'required',
            'type3' => 'required',
            'type5' => 'required',
            'type6' => 'required',
            'type7' => 'required',
        ];
    }

}