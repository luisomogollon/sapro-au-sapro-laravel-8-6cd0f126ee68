<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_servicio', function (Blueprint $table) {
            $table->foreignId('factura_id')
                   ->nullable()
                   ->constrained('facturas')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('servicio_id')
                   ->nullable()
                   ->constrained('servicios')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->decimal("factura_servicio_precio",8,2)->nullable()->default(1.0);
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
        Schema::dropIfExists('factura_servicio');
    }
}
