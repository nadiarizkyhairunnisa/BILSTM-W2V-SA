<?php

use Illuminate\Database\Schema\Blueprint;

class MigrationHelper
{
    public static function createSampleTable(Blueprint $table)
    {
        $table->id();
        $table->text('review');
        $table->text('processed_review');
        $table->enum('label', ['1', '0']);
    }
}
