<?php

namespace Theater\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{

    public function filesTemp(Request $request)
    {

        if ($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'person.*.email' => 'email|unique:users',
                'person.*.first_name' => 'required_with:person.*.last_name',
            ]);
            return $validator;
            foreach ($request->file() as $file) {
                $fileName = str_random(15) . '-' . $file->getClientOriginalName();
                $file->move(base_path() . '/public/temp/', $fileName);
                return ['route' => '/temp/' . $fileName, 'success' => 1];
            }
        }
    }
}
