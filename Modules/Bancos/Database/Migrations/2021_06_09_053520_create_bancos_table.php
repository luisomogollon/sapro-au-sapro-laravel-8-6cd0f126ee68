<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->id();
            $table->enum('banco_mineral',
                         ['ORO', 'PLATA', 'OTROS METALES'])
                        ->nullable();
            $table->string('banco_cuenta',250)
                         ->nullable();
            $table->decimal('banco_comision',8,2)->nullable();             
            $table->decimal('banco_cantidad_disponible', 12, 4)->default(0);
            $table->decimal('banco_cantidad_retiros', 12, 4)->nullable()->default(0);
            $table->decimal('banco_cantidad_depositos', 12, 4)->nullable()->default(0);
            $table->unique(['banco_mineral', 'banco_cuenta']);
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
        Schema::dropIfExists('bancos');
    }
}
