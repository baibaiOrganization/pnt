<?php

namespace Theater\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class FilesController extends Controller
{

    public function filesTemp(Request $request)
    {

        if ($request->ajax()) {

            /*  return ['jk' => $this->validation($request)->fails()];
              if ($this->validation($request)->fails())
                  return ['success' => 'error'];*/


            $types = $request->input('types');

            $arrayTypes = explode('|', $types);

            $normalize = [
                'application/pdf' => 'pdf',
                'application/epub+zip' => 'pdf',
                'application/epub+zip' => 'zip',
                'application/x-bzip' => 'zip',
                'application/zip' => 'zip',
                'zip' => 'zip',
                'application/x-zip-compressed' => 'zip',
                'application/x-rar-compressed' => 'rar',
                'rar' => 'rar',
                'image/png' => 'png',
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'application/pdf' => 'pdf',
            ];


            foreach ($request->file() as $file) {

                if (!in_array($normalize[$file->getMimeType()], $arrayTypes)) {
                    return ['success' => 'error'];
                }

                $fileName = str_random(15) . '-' . $file->getClientOriginalName();
                $file->move(base_path() . '/public/temp/', $fileName);

                return ['route' => '/temp/' . $fileName, 'success' => 1];
            }
        }
    }

    private function validation($request)
    {
        return Validator::make($request->all(), [
            'type29' => ['required', 'mimes:application/epub+zip,application/zip,application/x-rar-compressed']
        ]);
    }

}
