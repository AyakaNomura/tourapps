<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('type')->index();
            $table->timestamps();
            
            // 外部キー設定
            $table->foreign('tour_id')->references('id')->on('tours');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tours');
    }
}
