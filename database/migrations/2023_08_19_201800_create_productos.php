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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('marca_empresa_id'); // Clave foránea para la relación con marca_empresas
            $table->unsignedBigInteger('user_id'); // Clave foránea para la relación con users
            $table->string('imagen');
            $table->string('titulo');
            $table->decimal('precio', 10, 2);
            $table->timestamps();

            // Definir las restricciones de clave foránea
            $table->foreign('marca_empresa_id')->references('id')->on('marca_empresas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
