<?php

namespace Theater\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class FilesController extends Controller
{

    public function filesTemp(Request $request)
    {

        if ($request->ajax()) {


            return $request->input('type29');
            if ($this->validation($request)->fails())
                return ['success' => 'error'];

            foreach ($request->file() as $file) {
                $fileName = str_random(15) . '-' . $file->getClientOriginalName();
                $file->move(base_path() . '/public/temp/', $fileName);
                return ['route' => '/temp/' . $fileName, 'success' => 1];
            }
        }
    }

    private function validation($request)
    {
        return Validator::make($request->all(), [
            'type29' => 'mimes:application/epub+zip,application/zip,application/x-rar-compressed'
        ]);
    }

}
