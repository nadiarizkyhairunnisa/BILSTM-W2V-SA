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
}
