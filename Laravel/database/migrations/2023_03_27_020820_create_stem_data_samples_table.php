<?php

require_once 'MigrationHelper.php';

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stem_data_samples', function (Blueprint $table) {
            MigrationHelper::createDataSampleTable($table);
        });
    }

    public function down()
    {
        Schema::dropIfExists('stem_data_samples');
    }
};
