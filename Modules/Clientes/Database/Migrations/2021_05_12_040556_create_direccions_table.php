<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->string('direccion_alias')->nullable();
            $table->string('direccion_linea_1')->nullable();
            $table->string('direccion_linea_2')->nullable();
            $table->string('direccion_codigo_postal')->nullable();
            $table->string('direccion_estado')->nullable();
            $table->string('direccion_ciudad')->nullable();
            $table->string('direccion_telf')->nullable();
            $table->foreignId('cliente_id')
                  ->constrained('clientes')
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
        Schema::dropIfExists('direcciones');
    }
}
