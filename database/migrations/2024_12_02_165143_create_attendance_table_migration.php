<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->integer('classid');
            $table->integer('studentid');
            $table->tinyInteger('isPresent');
            $table->string('comments', 200);
            $table->timestamp('marked_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance');
    }
};
