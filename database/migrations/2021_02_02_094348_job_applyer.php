<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobApplyer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JobApplyers', function (Blueprint $table) {
            $table->bigIncrements('applyer_id');
            $table->foreignId('job_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('cv_file');
            $table->string('recom_file');
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
