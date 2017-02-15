<?php

namespace Theater\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{

    public function filesTemp(Request $request)
    {

        if ($request->ajax()) {



            if ($this->validation($request)->fails())
                return ['success' => 'false'];

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

    private function validation($request)
    {
        return Validator::make($request->all(), [
            'cantidad' => 'required',
            "valor" => "required",
            "id_ciudad_origen" => "required",
            "id_ciudad_destino" => "required",
            "peso_fisico" => "required",
            "packing.largo" => "required",
            "packing.ancho" => "required",
            "packing.alto" => "required",
            "packing.cantidad" => "required",
            "cantidad" => "required"
        ]);
    }

}
