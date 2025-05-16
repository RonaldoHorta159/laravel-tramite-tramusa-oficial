<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipoTramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            'EMISION',
            'RECEPCION',
        ];

        foreach ($tipos as $descripcion) {
            DB::table('tipo_tramites')->insert([
                'descripcion' => $descripcion,
            ]);
        }
    }
}
