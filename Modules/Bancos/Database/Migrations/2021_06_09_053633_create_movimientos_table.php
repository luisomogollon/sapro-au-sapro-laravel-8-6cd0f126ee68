<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->uuid("movimiento_codigo")
                  ->unique()
                  ->nullable();
            $table->boolean("activated")->nullable()->default(false);
            $table->enum('movimiento_tipo', ['DEPOSITO', 'RETIRO'])
                        ->default('DEPOSITO');
            $table->decimal('movimiento_cifra', 12, 4)->nullable();
            $table->foreignId('banco_id')
                    ->nullable()
                    ->constrained('bancos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('barra_id')
                    ->nullable()
                    ->constrained('barras')
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
        Schema::dropIfExists('movimientos');
    }
}
