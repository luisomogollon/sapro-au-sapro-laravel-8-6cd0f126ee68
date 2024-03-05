<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comisiones', function (Blueprint $table) {
            $table->id();
            $table->string('comision_descripcion',100)
                  ->unique()
                  ->nullable();
            $table->decimal('comision_monto', 5, 2)
            ->nullable()
            ->default(4.5);
            $table->decimal('comision_planta',5,2)
            ->nullable();
            $table->decimal('comision_cvm',5,2)
            ->nullable();
            $table->unsignedBigInteger('created_by_admin_user_id');
            $table->foreign('created_by_admin_user_id')
            ->references('id')
            ->on('admin_users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('updated_by_admin_user_id');
            $table->foreign('updated_by_admin_user_id')
            ->references('id')
            ->on('admin_users')
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
        Schema::dropIfExists('comisiones');
    }
}
