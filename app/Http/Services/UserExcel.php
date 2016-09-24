<?php

namespace Theater\Http\Services;

use Illuminate\Support\Facades\Mail;
use Theater\Entities\Award;
use Excel;

class UserExcel{

    public static function getExcel($type, $email){
        $dir = public_path('exports');
        $name = $type == 1 ? 'colon' : 'semana';

        $awards = Award::whereHas('user', function($query){
            $query->where('state', 1);
        })->where('award_type_id', $type)
            ->with(['organization'])
            ->get();


        Excel::create($name , function($excel) use($awards, $type){
            $excel->sheet('New sheet', function($sheet) use($awards, $type){
                if($type == 1)
                    $sheet->loadView('excel.colonUsers', compact('awards'));
                else
                    $sheet->loadView('excel.semanaUsers', compact('awards'));
            });
        })->store('xls', $dir, true);

        Mail::send('emails.' . $name .'Excel', function ($m) use($name, $email){
            $m->to($email,  $name)->subject('Descargar excel ' . $name);
        });
    }
}