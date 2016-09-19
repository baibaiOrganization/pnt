<?php

namespace Theater\Http\Services;

use Theater\Entities\Award;
use Theater\Entities\Production;
use Theater\Entities\Propietor;
use Theater\Entities\File;

class UserManagement{

    public static function insertColon($organization, $inputs){
        $data = static::getColonInputs($inputs);
        static::insert($organization, $data, $inputs, 1);
    }

    public static function insertSemana($organization, $inputs){
        $data = static::getSemanaInputs($inputs);
        static::insert($organization, $data, $inputs, 2);
    }

    public static function updateColon($organization, $inputs){
        $data = static::getColonInputs($inputs);
        $award = $organization->awardColon();
        static::update($organization, $data, $inputs, $award);
    }

    public static function updateSemana($organization, $inputs){
        $data = static::getSemanaInputs($inputs);
        $award = $organization->awardSemana();
        static::update($organization, $data, $inputs, $award);
    }

    private static function update($organization, $data, $inputs, $award){
        $organization->update($data['organization']);
        $organization->propietor->update($data['propietor']);
        $award->production->update($data['production']);
        static::uploadFile($award, $inputs);
    }

    private static function insert($organization, $data, $inputs, $awardType){
        $organization->update($data['organization']);
        $production = Production::create($data['production']);
        $data['propietor']['organization_id'] = $organization->id;
        $organization->propietor
            ? $organization->propietor->update($data['propietor'])
            : Propietor::create($data['propietor']);

        $award = Award::create([
            'award_type_id' => $awardType,
            'production_id' => $production->id
        ]);

        $organization->awards()->attach($award->id);
        static::uploadFile($award, $inputs, false);
    }

    private static function uploadFile($award, $inputs, $isUpdate = true){
        foreach ($inputs as $key => $file){
            if(strpos($key, 'type') !== false && strpos($file, 'temp') != false){
                $fileName = explode('/temp/', $file)[1];
                rename(base_path('public' . $file), base_path('public/uploads/semana/' . $fileName));
                $type = explode('type', $key)[1];
                $fileData = [
                    'name' => $fileName,
                    'file_type_id' => $type,
                    'award_id' => $award->id
                ];

                $isUpdate
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
        ];
    }
}