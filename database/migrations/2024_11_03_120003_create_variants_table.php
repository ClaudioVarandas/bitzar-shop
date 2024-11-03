<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id')->nullable()->index();
            $table->string('name', 150);
            $table->boolean('is_master');
            $table->integer('weight')->default(0);
            $table->integer('packaging_weight')->default(0);
            $table->smallInteger('sorting')->default(0);
            $table->boolean('is_fragile')->default(0);
            $table->boolean('is_hidden')->default(1);
            $table->boolean('is_discontinued')->default(0);
            $table->string('code', 20)->index();
            $table->dateTime('archived_at')->nullable();
            //
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::drop('variants');
    }
}
