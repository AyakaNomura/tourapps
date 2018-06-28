<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guide_id')->unsigned()->index();
            $table->string('tour_name');
            $table->string('place');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('price');
            $table->string('category');
            $table->text('content');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('guide_id')->references('id')->on('guides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
