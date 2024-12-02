<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->increments('id'); // Auto-incrementing primary key
            $table->integer('teacherid');
            $table->timestamp('starttime');
            $table->timestamp('endtime');
            $table->integer('credit_hours');
        });
    }

    public function down()
    {
        Schema::dropIfExists('class');
    }
};
