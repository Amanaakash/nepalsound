<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('thumbs')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('category_post_count')->default(0);
            $table->integer('order')->nullable();
            $table->boolean('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_categories');
    }
}
