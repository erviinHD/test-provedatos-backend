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
        Schema::create('provinces', function (Blueprint $table) {
            $table->string('nombre_provincia', 250);
            $table->string('capital_provincia', 250);
            $table->text('descripcion_provincia');
            $table->double('poblacion_provincia');
            $table->double('superficie_provincia');
            $table->float('latitud_provincia');
            $table->float('longitud_provincia');
            $table->string('id_region', 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
