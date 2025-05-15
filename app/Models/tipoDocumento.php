<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'tipo_documentos';  // coincide con tu migración
    public $timestamps = false;            // si no tienes timestamps

    protected $fillable = ['descripcion'];

    /**
     * Todos los documentos de este tipo.
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'tipo_documento_id');
    }
}
