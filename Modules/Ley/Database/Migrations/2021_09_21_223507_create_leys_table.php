<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leyes', function (Blueprint $table) {
            $table->id();
            $table->decimal('ley_margen',8,4);
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
            $table->foreignId('ley_id')
                ->nullable()
                ->constrained('leyes')
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
            $table->dropForeign(['ley_id']);
            $table->dropColumn('ley_id');
        });
        Schema::dropIfExists('leyes');
    }
}
