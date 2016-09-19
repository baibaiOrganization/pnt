<?php

namespace Theater\Http\Services;

use Theater\Entities\Award;
use Theater\Entities\Organization;

class UserManagement{

    public static function updateColon($organization, $inputs){
        $data = static::getColonInputs($inputs);
        $award = $organization->awardColon();
        static::update($organization, $award, $data, $inputs);
    }

    public static function updateSemana($organization, $inputs){
        $data = static::getSemanaInputs($inputs);
        $award = $organization->awardSemana();
        static::update($organization, $award, $data, $inputs);
    }

    private static function update($organization, $award, $data, $inputs){
        $organization->update($data['organization']);
        $organization->propietor->update($data['propietor']);
        $award->production->update($data['production']);

        foreach ($inputs as $key => $file){
            if(strpos($key, 'type') !== false && strpos($file, 'temp') != false){
                $fileName = explode('/temp/', $file)[1];
                rename(base_path('public' . $file), base_path('public/uploads/semana/' . $fileName));
                $type = explode('type', $key)[1];
                $award->file($type)->update(['name' => $fileName]);
            }
        }
    }

    private static function getSemanaInputs($inputs){
        return [
            'organization' => [
                'name' => $inputs['org_name'],
                'city' => $inputs['org_city'],
                'address' => $inputs['org_address'],
                'phone' => $inputs['org_phone'],
                'mobile' => $inputs['org_mobile'],
                'email' => $inputs['org_email'],
                'website' => $inputs['org_website'],
                'socials' => ',,',
            ],

            'award' => [
                'award_type_id' => 1,
                //'production_id' => $prd->id
            ],

            'production' => [
                'name' => $inputs['prd_name'],
                'genre' => $inputs['prd_genre'],
            ],

            'propietor' => [
                'name' => $inputs['rep_name'],
                'last_name' => $inputs['rep_last_name'],
                'document_type_id' => $inputs['rep_doc_typ'],
                'document_number' => $inputs['rep_doc_number'],
                'mobile' => $inputs['rep_mobile'],
                'email1' => $inputs['rep_email'],
                'email2' => $inputs['rep_email2'],
                //'organization_id' => $org->id
            ],
        ];
    }

    private static function getColonInputs($inputs){
        return [
            'organization' => [
                'name' => $inputs['org_name'],
                'city' => $inputs['org_city'],
                'address' => $inputs['org_address'],
                'phone' => $inputs['org_phone'],
                'mobile' => $inputs['org_mobile'],
                'email' => $inputs['org_email'],
                'website' => $inputs['org_website'],
                'socials' => $inputs['facebook'] . ',' . $inputs['instagram'] . ',' . $inputs['twitter'],
            ],

            'award' => [
                'award_type_id' => 1,
                //'production_id' => $prd->id
            ],

            'production' => [
                'name' => $inputs['prd_name'],
                'release_date' => $inputs['prd_date'],
                'genre' => $inputs['prd_genre'],
                'link_video' => $inputs['prd_video'],
            ],

            'propietor' => [
                'name' => $inputs['rep_name'],
                'last_name' => $inputs['rep_last_name'],
                'document_type_id' => $inputs['rep_doc_typ'],
                'document_number' => $inputs['rep_doc_number'],
                'mobile' => $inputs['rep_mobile'],
                'email1' => $inputs['rep_email1'],
                'email2' => $inputs['rep_email2'],
                //'organization_id' => $org->id
            ],
        ];
    }
}