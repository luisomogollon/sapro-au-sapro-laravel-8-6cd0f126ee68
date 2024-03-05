<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_registro', function (Blueprint $table) {
            $table->id();
            $table->jsonb('orden_registro_log')->nullable();
            $table->foreignId('orden_id')
                   ->nullable()
                   ->constrained('ordenes')
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
        Schema::dropIfExists('orden_registro');
    }
}
