<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->comment('Codigo unico con formarto CU000001');
            $table->string('subject')->nullable()->comment('Asunto del documento');

            //clasificacion del documento
            $table->unsignedBigInteger('tipo_documento_id');
            $table->unsignedBigInteger('tipo_tramite_id');
            $table->unsignedBigInteger('estado_documento_id')->nullable()->comment('Estado actual(BORRADOR, EN_PROCESO, REVISION, APROBADO, RECHAZADO, ARCHIVADO)');
            
            //estado de flujo y prioridad
            $table->enum('status', [
                'BORRADOR',
                'EN_PROCESO',
                'REVISION',
                'APROBADO',
                'RECHAZADO',
                'ARCHIVADO'
            ])->default('BORRADOR')->comment('Estado del flujo del documento');
            $table->enum('priority',[
                'BAJA',
                'MEDIA',
                'ALTA'
            ])->default('MEDIA')->commend('Prioridad del documento');

            //quien creo y quien actuualizo por ultima vez el documento
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();


            $table->timestamps();

            //indices (mejoran la consulta)
            $table->index('status');
            $table->index('priority');
            $table->index('created_by');

            //foreign keys
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('restrict');
            $table->foreign('tipo_tramite_id')->references('id')->on('tipo_tramites')->onDelete('restrict');
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
