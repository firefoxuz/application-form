<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('theme', 128);
            $table->text('message');
            $table->string('file_path')->comment('path for a document')->nullable();
            $table->string('status')->comment('1 - waiting, 2 - answered');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forms');
    }
};
