<?php
// Child migration
use Illuminate\Database\Migrations\Migration;

class CreateAnotherTable extends Migration
{
    protected $tableName = 'stem_data_samples';

    // This extends the base migration
    public function up()
    {
        parent::up();
    }

    // This extends the base migration
    public function down()
    {
        parent::down();
    }
}
