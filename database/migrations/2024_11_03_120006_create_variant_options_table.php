<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up()
    {
        Schema::create('variant_options', function (Blueprint $table) {
            $table->uuid('variant_id')->index();
            $table->uuid('option_value_id')->unique();
            //
            $table->primary(['variant_id', 'option_value_id'], 'variant_options_pkey');
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::drop('variant_options');
    }
}
