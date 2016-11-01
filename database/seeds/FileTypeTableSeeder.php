<?php

use Illuminate\Database\Seeder;
use \Theater\Entities\FileType;

class FileTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FileType::create([
            'id' => 1,
            'name' => 'Sinópsis'
        ]);

        FileType::create([
            'id' => 2,
            'name' => 'Texto o libreto'
        ]);

        FileType::create([
            'id' => 3,
            'name' => 'Certificado de registro de Derechos de Autor'
        ]);

        FileType::create([
            'id' => 4,
            'name' => 'Certificación de música original en caso de tenerla'
        ]);

        FileType::create([
            'id' => 5,
            'name' => 'Dossier'
        ]);

        FileType::create([
            'id' => 6,
            'name' => 'Soporte de 5 presentaciones realizadas hasta el 30 de Sept'
        ]);

        FileType::create([
            'id' => 7,
            'name' => 'Hoja de Vida de c/u de los integrantes'
        ]);

        FileType::create([
            'id' => 8,
            'name' => 'Logo, foto o imagen identificativa'
        ]);

        FileType::create([
            'id' => 9,
            'name' => 'Cámara de comercio (.pdf)'
        ]);

        FileType::create([
            'id' => 10,
            'name' => 'Reseña Corta en Español (.pdf)'
        ]);

        FileType::create([
            'id' => 11,
            'name' => 'Propuesta de dirección (.pdf)'
        ]);

        FileType::create([
            'id' => 12,
            'name' => 'Propuesta Estética (.pdf) Enlace a condiciones y equipamiento técnico del Teatro Colón'
        ]);

        FileType::create([
            'id' => 13,
            'name' => 'Cronograma (.pdf)'
        ]);

        FileType::create([
            'id' => 14,
            'name' => 'Presupuesto (.pdf) Honorarios, servicios a contratar y actividades a realizar.'
        ]);

        FileType::create([
            'id' => 15,
            'name' => 'Propuesta de Financiación (.pdf)'
        ]);

        FileType::create([
            'id' => 16,
            'name' => 'Hoja de vida de la agrupación, grupo constituido o de los integrantes de la unión temporal (.pdf)'
        ]);

        FileType::create([
            'id' => 17,
            'name' => 'Carta de Compromiso'
        ]);

        FileType::create([
            'id' => 18,
            'name' => 'Documento de delegación de representación (.pdf)'
        ]);

        FileType::create([
            'id' => 19,
            'name' => 'Fotocopia de la Cédula Representante Legal (.pdf)'
        ]);

        FileType::create([
            'id' => 20,
            'name' => 'Foto ilustrativa (Mejor escenografía)'
        ]);

        FileType::create([
            'id' => 21,
            'name' => 'Bocetos de diseños (Mejor escenografía)'
        ]);

        FileType::create([
            'id' => 22,
            'name' => 'Foto ilustrativa (Mejor maquillaje)'
        ]);

        FileType::create([
            'id' => 23,
            'name' => 'Bocetos de diseños (Mejor maquillaje)'
        ]);

        FileType::create([
            'id' => 24,
            'name' => 'Foto ilustrativa (Mejor vestuario)'
        ]);

        FileType::create([
            'id' => 25,
            'name' => 'Bocetos de diseños (Mejor vestuario)'
        ]);

        FileType::create([
            'id' => 26,
            'name' => 'Foto ilustrativa (Mejor iluminación)'
        ]);

        FileType::create([
            'id' => 27,
            'name' => 'Bocetos de diseños (Mejor iluminación)'
        ]);
    }
}
