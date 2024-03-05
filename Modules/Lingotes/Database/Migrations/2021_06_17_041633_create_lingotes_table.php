<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLingotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lingotes', function (Blueprint $table) {
            $table->id();
            $table->decimal('lingote_peso', 12, 4)->nullable();
            $table->decimal('lingote_peso_real',12,4)->nullable();
            $table->decimal('lingote_ley',12,4)->nullable();
            $table->string('lingote_troquelado_codigo')->unique()->nullable();
            $table->text('lingote_descripcion')->nullable();
            $table->foreignId('salida_id')
                ->nullable()
                ->constrained('salidas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('orden_id')
                ->nullable()
                ->constrained('ordenes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('presentacion_id')
                ->nullable()
                ->constrained('presentaciones')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('lingote_estado_id')
                ->nullable()
                ->constrained('lingote_estado')
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
        Schema::dropIfExists('lingotes');
    }
}
