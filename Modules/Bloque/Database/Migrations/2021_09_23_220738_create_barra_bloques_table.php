<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarraBloquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barra_bloque', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bloque_id')
                   ->nullable()
                   ->constrained('bloques')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('barra_id')
                  ->nullable()
                  ->constrained('barras')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->decimal('barra_bloque_cantidad',12,4);
            $table->foreignId('user_id')
                   ->nullable()
                   ->constrained('users')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->unique(['bloque_id','barra_id']);
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
        Schema::dropIfExists('barra_bloque');
    }
}
