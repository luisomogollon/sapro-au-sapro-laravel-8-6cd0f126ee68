<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInconformidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inconformidades', function (Blueprint $table) {
            $table->id();
            $table->string('inconformidad_tipo')->nullable();
            $table->boolean('activated')->default(false);
            $table->text('body')->default(null)->nullable();
            $table->text('description')->nullable()->default(null);
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model_type')->nullable();
            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inconformidades');
    }
}
