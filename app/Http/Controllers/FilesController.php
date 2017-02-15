<?php

namespace Theater\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{

    public function filesTemp(Request $request)
    {

        if ($request->ajax()) {
            return $request->file();

            foreach ($request->file() as $file) {
                $fileName = str_random(15) . '-' . $file->getClientOriginalName();
                $file->move(base_path() . '/public/temp/', $fileName);
                return ['route' => '/temp/' . $fileName];
            }
        }
    }
}
