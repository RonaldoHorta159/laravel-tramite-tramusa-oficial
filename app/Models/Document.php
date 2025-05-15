<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'code',
        'subject',
        'tipo_documento_id',
        'tipo_tramite_id',
        'status',
        'priority',
        'created_by',
        'updated_by',
    ];

    /**
     * El tipo de documento (oficio, memo, etc).
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    /**
     * El tipo de trámite (registro interno, autorización, etc).
     */
    public function tipoTramite()
    {
        return $this->belongsTo(TipoTramite::class, 'tipo_tramite_id');
    }


}
