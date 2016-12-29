<?php

namespace Theater\Http\Services;

use Theater\Entities\Award;
use Theater\Entities\Organization;
use Theater\Entities\Production;
use Theater\Entities\Propietor;
use Theater\Entities\File;

class UserManagement{

    public static function insertColon($user, $inputs){
        $data = static::getColonInputs($inputs);
        static::insert($user, $data, $inputs, 1);
    }

    public static function insertSemana($user, $inputs){
        $data = static::getSemanaInputs($inputs);
        static::insert($user, $data, $inputs, 2);
    }

    public static function updateColon($award, $inputs){
        $data = static::getColonInputs($inputs);
        static::update($award, $data, $inputs);
    }

    public static function updateSemana($award, $inputs){
        $data = static::getSemanaInputs($inputs);
        static::update($award, $data, $inputs);
    }

    private static function update($award, $data, $inputs){
        $award->update($data['award']);
        $award->organization->update($data['organization']);
        $award->propietor->update($data['propietor']);
        $award->production->update($data['production']);
        static::uploadFile($award, $inputs);
    }

    private static function insert($user, $data, $inputs, $awardType){
        $isUpdate = false;
        foreach($user->awards as $key => $a){
            $isUpdate = $a->award_type_id == $awardType;
            if($isUpdate){
                $award = $a;
                $award->update($data['award']);
                $award->organization->update($data['organization']);
                $award->production->update($data['production']);
                $award->propietor->update($data['propietor']);
                break;
            }
        }

        if(!$isUpdate){

            $organization = Organization::create($data['organization']);
            $production = Production::create($data['production']);
            $propietor = Propietor::create($data['propietor']);
            $award = Award::create([
                'state' => $data['state'],
                'award_type_id' => $awardType,
                'user_id' => $user->id,
                'organization_id' => $organization->id,
                'production_id' => $production->id,
                'propietor_id' => $propietor->id,
                'categories' => $data['award']['categories'],
                'sound' => $data['award']['sound'],
                'isPreselected' => $data['award']['isPreselected'],
                'region_id' => $data['award']['region_id'],
                'acceptTerms' => $data['award']['acceptTerms']
            ]);
        }

        static::uploadFile($award, $inputs, isset($inputs['isUpdate']));
    }
    
    private static function uploadFile($award, $inputs, $isUpdate = false){
        foreach ($inputs as $key => $file){
            if(strpos($key, 'type') !== false && strpos($file, 'temp') != false){

                $fileName = $isUpdate ? $file : explode('/temp/', $file)[1];
                !$isUpdate ? rename(base_path('public' . $file), base_path('public/uploads/' . $award->awardType->name . '/' . $fileName)) : null;

                $type = explode('type', $key)[1];
                $fileData = [
                    'name' => $fileName,
                    'file_type_id' => $type,
                    'award_id' => $award->id
                ];

                $award->file($type)
                    ? $award->file($type)->update($fileData)
                    : File::create($fileData);
            }

        }
    }

    private static function getSemanaInputs($inputs){
        $categories = '';
        for ($i = 1; $i <= 10; $i++){
            if(isset($inputs['check' . $i]))
                $categories .= $inputs['check' . $i] . ',';
        }

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
                'region_id' => $inputs['org_region'] ? $inputs['org_region'] : 1
            ],

            'production' => [
                'name' => $inputs['prd_name'],
                'release_date' => $inputs['prd_date'],
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
            ],

            'award' => [
                'state' => isset($inputs['isUpdate']) ? 0 : 1,
                'categories' => $categories,
                'sound' => isset($inputs['cat_sound']) ? $inputs['cat_sound'] : '',
                'isPreselected' => $inputs['org_region'] == 2 ? 0 : 1,
                'region_id' => $inputs['org_region'] ? $inputs['org_region'] : 1,
                'acceptTerms' => 1
            ],

            'state' => isset($inputs['isUpdate']) ? 0 : 1
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
                'region_id' => $inputs['org_region'] ? $inputs['org_region'] : 1
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
            ],

            'award' => [
                'state' => isset($inputs['isUpdate']) ? 0 : 1,
                'sound' => '',
                'categories' => '',
                'isPreselected' => 1,
                'region_id' => $inputs['org_region'] ? $inputs['org_region'] : 1,
                'acceptTerms' => $inputs['accept']
            ],

            'state' => isset($inputs['isUpdate']) ? 0 : 1
        ];
    }
}