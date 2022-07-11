<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('sur_name', 255);
            $table->string('tc_no',11);
            $table->string('e_mail',255);
            $table->string('phone_num');
            $table->boolean('kvkk')->default(0);
            $table->boolean('kullanim')->default(0);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('price');
            $table->boolean('payment_type')->default(0);
            $table->softDeletes();


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
        Schema::dropIfExists('form');
    }
};