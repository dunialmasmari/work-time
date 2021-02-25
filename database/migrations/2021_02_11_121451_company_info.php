<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompanyInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('compnyInfo', function (Blueprint $table) {
            $table->bigIncrements('company_id');
            $table->foreignId('user_id');
            $table->string('logo');
            $table->string('companyName');
            $table->string('websitelink');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->longText('aboutCompany');
            $table->integer('size');
            $table->string('type');
            $table->date('founded');
            $table->string('industry');
          //  $table->boolean('active');
            $table->longText('description');
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
