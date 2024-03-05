<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_rif')->unique()->nullable();
            $table->string('cliente_correo')->unique()->nullable();
            $table->string('cliente_nombre')->nullable();
            $table->string('cliente_telf')->nullable();
            $table->string('cliente_tipo',255)->nullable()->default('PARTICULAR');
            $table->boolean('enabled')->nullable()->default(0);
            $table->foreignId('comision_id')
            ->nullable()
            ->constrained('comisiones')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('presentacion_id')
            ->nullable()
            ->constrained('presentaciones')
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
        Schema::dropIfExists('clientes');
    }
}
