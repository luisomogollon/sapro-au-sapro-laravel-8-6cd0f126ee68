<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->uuid("salida_referencia")
                ->unique()
                ->nullable();
            $table->boolean("activated")->default(false)->nullable();
            $table->string("salida_descripcion")->nullable();
            $table->foreignId('colector_id')
                ->nullable()
                ->constrained('colectores')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('salida_estado_id')
                ->nullable()
                ->constrained('salida_estado')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('created_by_admin_user_id')
                ->nullable()
                ->constrained('admin_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('updated_by_admin_user_id')
                ->nullable()
                ->constrained('admin_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('entregado_id')
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
        Schema::dropIfExists('salidas');
    }
}
