<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->uuid("orden_referencia")
                ->unique()
                ->nullable();
            $table->text('orden_descripcion')
                ->nullable();
            $table->string('orden_cedula')
                  ->nullable()
                  ->default(null);
            $table->enum('orden_tipo', ['BCV', 'EMPRESA'])
                ->nullable()
                ->default('BCV');
            $table->boolean('orden_troquelar')
            ->nullable()
            ->default(false);
            $table->boolean('orden_impresa')
            ->nullable()
            ->default(false);
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('cliente_id')
                ->nullable()
                ->constrained('clientes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('receptor_id')
                ->nullable()
                ->constrained('clientes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('comision_id')
                ->nullable()
                ->constrained('comisiones')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('orden_estado_id')
                ->nullable()
                ->constrained('orden_estado')
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
        Schema::dropIfExists('ordenes');
    }
}
