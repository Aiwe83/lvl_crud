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
        //Aqui crearemos las columnas de la base de datos
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 75); //Columna y longitud
            $table->float('due')->default(0); //Columna "Deuda" que por default este en 0
            $table->text('comments')->nullable(); //Columna "Comentarios que se permite estar nula
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
