<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleanDataSamples extends Migration
{
    public function up()
    {
        Schema::create('clean_data_samples', function (Blueprint $table) {
            $table->id();
            $table->text('review');
            $table->text('processed_review');
            $table->enum('label', ['1', '0']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
