<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory; // Permite usar las factorías de Eloquent para pruebas y seeders

    // Define los campos que se pueden asignar masivamente
    protected $fillable = [
        'code',              // Código único del documento
        'subject',           // Asunto o título del documento
        'tipo_documento_id', // Relación con el tipo de documento
        'tipo_tramite_id',   // Relación con el tipo de trámite
        'status',            // Estado del documento
        'priority',          // Prioridad del documento
        'created_by',        // Usuario que creó el documento
        'updated_by',        // Usuario que actualizó el documento
    ];

    /**
     * Relación: El tipo de documento (oficio, memo, etc).
     * Un documento pertenece a un tipo de documento.
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    /**
     * Relación: El tipo de trámite (registro interno, autorización, etc).
     * Un documento pertenece a un tipo de trámite.
     */
    public function tipoTramite()
    {
        return $this->belongsTo(TipoTramite::class, 'tipo_tramite_id');
    }


}
