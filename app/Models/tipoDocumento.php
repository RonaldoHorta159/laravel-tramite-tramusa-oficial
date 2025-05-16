<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoDocumento extends Model
{
    use HasFactory; // Permite usar las factorías de Eloquent para pruebas y seeders

    // Nombre de la tabla asociada a este modelo
    protected $table = 'tipo_documentos';  // coincide con tu migración
    // Indica que no se usan timestamps (created_at, updated_at)
    public $timestamps = false;            // si no tienes timestamps

    // Campos que se pueden asignar masivamente
    protected $fillable = ['descripcion']; // Descripción del tipo de documento

    /**
     * Relación: Todos los documentos de este tipo.
     * Un tipo de documento puede tener muchos documentos asociados.
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'tipo_documento_id');
    }
}
