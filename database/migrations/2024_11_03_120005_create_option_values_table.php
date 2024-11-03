<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up()
    {
        Schema::create('option_values', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('option_id')->nullable()->index();
            $table->string('value', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::drop('option_values');
    }
}
