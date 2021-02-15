<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CvRecommendations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_recommendations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('userdetail_id')->constrained('userdetails');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->longText('description');
            $table->boolean('active');
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
        //
    }
}
