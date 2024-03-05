<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentaciones', function (Blueprint $table) {
            $table->id();
            $table->string('presentacion_nombre')->nullable();
            $table->decimal('presentacion_peso',8,2)->nullable();
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
        Schema::dropIfExists('presentaciones');
    }
}
