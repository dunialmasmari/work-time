<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('job_id');
            $table->foreignId('user_id');
            $table->foreignId('major_id');
            $table->string('title');
            $table->string('image');
            $table->string('company');
            $table->boolean('register_here');
            $table->string('apply_link');
            $table->string('email');
            $table->longText('description');
            $table->longText('requerment');
            $table->date('start_date');
            $table->date('deadline');
            $table->date('posted_date');
            $table->boolean('active');
            $table->string('location');
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
