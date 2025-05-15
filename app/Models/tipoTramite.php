<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoTramite extends Model
{
    use HasFactory;

    protected $table = 'tipo_tramites';
    public $timestamps = false;

    protected $fillable = ['descripcion'];

    /**
     * Todos los documentos de este trámite.
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'tipo_tramite_id');
    }

}
