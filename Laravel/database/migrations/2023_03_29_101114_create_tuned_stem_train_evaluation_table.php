<?php

require_once 'MigrationHelper.php';

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tuned_stem_train_evaluation', function (Blueprint $table) {
            MigrationHelper::createModelEvaluationTable($table);
        });
    }
    public function down()
    {
        Schema::dropIfExists('tuned_stem_train_evaluation');
    }
};
