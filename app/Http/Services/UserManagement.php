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
                $award->update(['state' => $data['state']]);
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
                'propietor_id' => $propietor->id
            ]);
        }

        static::uploadFile($award, $inputs, isset($inputs['isUpdate']));
    }
    
    private static function uploadFile($award, $inputs, $isUpdate = false){
        foreach ($inputs as $key => $file){
            if(strpos($key, 'type') !== false && strpos($file, 'temp') != false){
                $fileName = $isUpdate ? $file : explode('/temp/', $file)[1];
                !$isUpdate ? rename(base_path('public' . $file), base_path('public/uploads/semana/' . $fileName)) : null;

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
            ],

            'state' => isset($inputs['isUpdate']) ? 0 : 1
        ];
    }
}