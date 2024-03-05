<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BarraMetal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barra_metal', function (Blueprint $table) {
            $table->foreignId('barra_id')
                   ->nullable()
                   ->constrained('barras')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('metal_id')
                   ->nullable()
                   ->constrained('metales')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->decimal("barra_metal_contenido",8,2)->nullable();
            $table->unique(['barra_id','metal_id']);
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
        Schema::dropIfExists('barra_metal');
    }
}
