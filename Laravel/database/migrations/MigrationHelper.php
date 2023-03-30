<?php

use Illuminate\Database\Schema\Blueprint;

class MigrationHelper
{
    public static function createDataSampleTable(Blueprint $table)
    {
        $table->id('No');
        $table->text('Review');
        $table->text('Processed Review');
        $table->enum('Label', ['1', '0']);
    }

    public static function createModelEvaluationTable(Blueprint $table)
    {
        $table->id('Epoch');
        $table->double('Loss');
        $table->double('Accuracy');
        $table->double('F1 Score');
        $table->double('Precision');
        $table->double('Recall');
        $table->double('TP');
        $table->double('TN');
        $table->double('FP');
        $table->double('FN');
    }
}
