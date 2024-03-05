<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateMetalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metales', function (Blueprint $table) {
            $table->id();
            $table->uuid("metal_codigo")
            ->unique();
            $table->string("metal_nombre")->unique()->nullable();
            $table->string("metal_simbolo")->unique()->nullable();
            $table->text("metal_descripcion")->nullable();
            $table->boolean("activated")->nullable()->default(false);
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
        Schema::dropIfExists('metales');
    }
}
