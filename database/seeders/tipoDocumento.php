<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipoDocumento extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Documentos = [
            "ANEXO",
            "ACTA",
            "CARTA",
            "CARTA CIRCULAR",
            "CARTA MÚLTIPLE",
            "CARTA NOTARIAL",
            "CIRCULAR",
            "CONTRATO",
            "CONVENIO",
            "DECLARACIÓN JURADA",
            "DICTAMEN",
            "EXPEDIENTE",
            "INFORME",
            "INFORME CIRCULAR",
            "INFORME MULTIPLE",
            "INVITACION",
            "MEMO MÚLTIPLE",
            "MEMORANDUM",
            "MEMORANDUM CIRCULAR",
            "MEMORIAL",
            "NOTIFICACIÓN",
            "OFICIO",
            "OFICIO CIRCULAR",
            "OFICIO MÚLTIPLE",
            "REQUERIMIENTO",
            "RESOLUCION",
            "SOLICITUD",
            "ORDEN DE COMPRA",
            "ORDEN DE SERVICIO",
            "CERTIFICACIÓN PRESUPUESTAL",
            "REGISTRO CONTABLE DE PROVISIONES",
            "REGISTRO CONTABLE DE COMPRAS",
            "REGISTRO CONTABLE DE VENTAS",
            "REGISTRO CONTABLE DE HONORARIOS",
            "REGISTRO CONTABLE DE PLANILLA",
            "RENDICION",
        ];

        foreach ($Documentos as $descripcion) {
            DB::table('tipo_documentos')->insert([
                'descripcion' => $descripcion,
            ]);
        }
    }
}
