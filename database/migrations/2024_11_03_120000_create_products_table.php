<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('primary_collection_id')->nullable()->index();
            $table->string('name', 150);
            $table->text('description')->nullable();
            $table->string('slug', 150)->unique();
            $table->string('meta_title', 300)->nullable();
            $table->text('meta_description');
            $table->string('meta_keywords', 300)->nullable();
            $table->boolean('is_discontinued')->default(0);
            $table->boolean('is_searchable')->default(1);
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
        Schema::drop('products');
    }
}
