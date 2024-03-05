<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarraLingotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barra_lingote', function (Blueprint $table) {
            $table->id();
            $table->decimal('barra_lingote_cantidad',8,2);
            $table->foreignId('barra_id')
            ->constrained('barras')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('lingote_id')
            ->constrained('lingotes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unique(['barra_id','lingote_id']);
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
        Schema::dropIfExists('barra_lingote');
    }
}
