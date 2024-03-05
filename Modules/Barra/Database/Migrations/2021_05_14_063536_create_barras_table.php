<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateBarrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barras', function (Blueprint $table) {
            $table->id();
            $table->uuid("barra_codigo")
                  ->unique();
            $table->decimal("barra_peso_ingreso",12,4)->nullable();
            $table->decimal("barra_ultimo_peso",12,4)->nullable();
            $table->decimal("barra_peso_lab",12,4)->nullable();
            $table->decimal("barra_peso_lab_salida")->nullable();
            $table->decimal("barra_peso_refineria",12,4)->nullable();
            $table->decimal("barra_ley_ingreso",8,2)->nullable();
            $table->decimal("barra_ley_final",8,2)->nullable();
            $table->decimal("barra_ley_recuperable",8,2)->nullable();
            $table->decimal("barra_muestra",12,4)->nullable();
            $table->decimal("barra_muestra_procesada",12,4)->nullable();
            $table->decimal("barra_peso_granalla",12,4)->nullable();
            $table->decimal("barra_peso_banco",12,4)->nullable();
            $table->decimal("barra_oro_cliente",12,4)->nullable();
            $table->decimal("barra_oro_comision",12,4)->nullable();
            $table->decimal("barra_oro_comision_real",12,4)->nullable();
            $table->decimal("barra_comision",12,4)->nullable();
            $table->enum('barra_und_masa', ['kg', 'gr','oz','lbs'])->nullable()->default('gr');
            $table->decimal("barra_plata_comision",12,4)->nullable();
            $table->decimal("barra_otros_comision",12,4)->nullable();
            $table->text("barra_descripcion_operacion")->nullable();
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('barra_estado_id')
                  ->nullable()
                  ->constrained('barra_estado')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
                  $table->foreignId('orden_id')
                  ->nullable()
                  ->constrained('ordenes')
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
        Schema::dropIfExists('barras');
    }
}
