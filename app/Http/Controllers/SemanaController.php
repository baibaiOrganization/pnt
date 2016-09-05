<?php

namespace Theater\Http\Controllers;

use Directory\Entities\Country;
use Directory\Entities\Sector;
use Illuminate\Http\Request;

use Directory\Http\Requests;

class SemanaController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    function index(){

        return view('front.semana');
    }
}
