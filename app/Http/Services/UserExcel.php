<?php

namespace Theater\Http\Services;

use Illuminate\Support\Facades\Mail;
use Theater\Entities\Organization;
use Excel;

class UserExcel{

    public static function getExcel($type){
        $dir = public_path('exports');
        $name = $type == 1 ? 'colon' : 'semana';

        $users = Organization::whereHas('user', function($query){
            $query->select('id')->where('role_id', 2);
        })->whereHas('awards', function($query) use($type){
            $query->where('award_type_id', $type);
        })->with(['user', 'awards'])->orderBy('created_at', 'DESC')->get();


        Excel::create($name , function($excel) use($users, $type){
            $excel->sheet('New sheet', function($sheet) use($users, $type){
                $organizations = $users;
                if($type == 1)
                    $sheet->loadView('excel.colonUsers', compact('organizations'));
                else
                    $sheet->loadView('excel.semanaUsers', compact('organizations'));
            });
        })->store('xls', $dir, true);

        Mail::send('emails.' . $name .'Excel', function ($m) use($name){
            $m->to('sanruiz1003@gmail.com',  $name)->subject('Descargar excel ' . $name);
        });
    }
}