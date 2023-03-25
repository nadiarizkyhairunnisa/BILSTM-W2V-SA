<?php

require_once 'MigrationHelper.php';

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clean_sample_data', function (Blueprint $table) {
            MigrationHelper::createSampleTable($table);
        });
    }

    public function down()
    {
        Schema::dropIfExists('clean_sample_data');
    }
};
