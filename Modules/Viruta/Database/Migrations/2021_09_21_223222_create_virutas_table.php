<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVirutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virutas', function (Blueprint $table) {
            $table->id();
            $table->decimal('viruta_muestra',8,4);
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
        Schema::table('barras',function (Blueprint $table){
            $table->foreignId('viruta_id')
                ->nullable()
                ->constrained('virutas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barras',function (Blueprint $table){
            $table->dropForeign(['viruta_id']);
            $table->dropColumn('viruta_id');
        });
        Schema::dropIfExists('virutas');
    }
}
