<?php

namespace Theater\Http\Controllers;

use Directory\Entities\Country;
use Directory\Entities\Sector;
use Illuminate\Http\Request;

use Directory\Http\Requests;

class HomeController extends Controller
{
    function index(){
        return view('front.home');
    }

    function chooseForm(){
        $awards = auth()->user()->organization->awards;
        $event = [0 , 0];

        foreach ($awards as $award){
            if($award['state'] == 1){
                if($award['award_type_id'] == 1)
                    $event[0] = 1;
                else
                    $event[1] = 1;
            }
        }

        return view('front.formsMenu', compact('event'));
    }
}
