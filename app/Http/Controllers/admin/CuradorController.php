<?php

namespace Theater\Http\Controllers\admin;

use Illuminate\Http\Request;

use Theater\Entities\Award;
use Theater\Http\Requests;
use Theater\Http\Controllers\Controller;

class CuradorController extends Controller
{
    function selectedUpdate(Request $request){

        $award = Award::find($request->get('award_id'));
        $state = $request->get('isSelected') == 'true' ? 1 : 0;
        $update = auth()->user()->role_id === 3
                ? ['isSelected' => $state]
                : ['isPreselected' => $state];

        $award->update($update);
        return $award;
    }
}
