<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarraRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barra_registro', function (Blueprint $table) {
            $table->id();
            $table->jsonb('barra_registro_log')->nullable();
            $table->foreignId('barra_id')
                   ->nullable()
                   ->constrained('barras')
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
        Schema::dropIfExists('barra_registro');
    }
}
