<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColectoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colectores', function (Blueprint $table) {
            $table->id();
            $table->string('colector_nombres')->nullable();
            $table->string('colector_apellidos')->nullable();
            $table->string('colector_cedula',15)->nullable();
            $table->foreignId('cliente_id')
            ->nullable()
            ->constrained('clientes')
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
        Schema::dropIfExists('colectores');
    }
}
