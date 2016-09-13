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
        return view('front.formsMenu');
    }
}
