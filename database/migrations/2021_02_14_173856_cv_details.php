<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CvDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('userdetail_id')->constrained('userdetails');
            $table->string('title');
            $table->string('subtitle');
            $table->date('start_date');
            $table->date('end_date');
            $table->longText('description');
            $table->integer('type');
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
