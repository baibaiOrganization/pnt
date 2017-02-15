<?php

namespace Theater\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class FilesController extends Controller
{

    public function filesTemp(Request $request)
    {

        if ($request->ajax()) {

            return  ['jk'=>$request->file()];

            return ['jk' => $this->validation($request)->fails()];
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
            'type29' => ['required','mimes:application/epub+zip,application/zip,application/x-rar-compressed']
        ]);
    }

}
