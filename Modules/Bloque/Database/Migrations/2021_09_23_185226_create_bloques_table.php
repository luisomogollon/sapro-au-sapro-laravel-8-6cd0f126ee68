<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloques', function (Blueprint $table) {
            $table->id();
            $table->decimal('bloque_peso',12,4);
            $table->decimal('bloque_oro_cargado',12,4)->nullable();
            $table->decimal('bloque_oro_resultado',12,4)->nullable();
            $table->decimal('bloque_oro_granalla',12,4)->nullable();
            $table->decimal('bloque_oro_ley',12,4)->nullable();
            $table->decimal('bloque_oro_ley_real',12,4)->nullable();
            $table->decimal('bloque_plata_cargado',12,4)->nullable();
            $table->decimal('bloque_plata_resultado',12,4)->nullable();
            $table->decimal('bloque_otros_cargado',12,4)->nullable();
            $table->decimal('bloque_otros_resultado',12,4)->nullable();
            $table->foreignId('bloque_estado_id')
                   ->nullable()
                   ->constrained('bloque_estado')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('user_id')
                   ->nullable()
                   ->constrained('users')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bloques');
    }
}
