<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->string('post_unique_id');
            $table->string('slug', 100)->unique();
            $table->string('thumbs')->nullable();
            $table->text('publish_date')->nullable();
            $table->string('thumbs_2')->nullable();
            $table->string('url')->nullable();
            $table->text('short_description')->nullable();
            $table->boolean('status')->default('1');
            $table->boolean('featured')->nullable();
            $table->string('order')->nullable()->default(1);
            $table->unsignedInteger('visit_no')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('blogs', function ($table) {
            $table->foreign('category_id')
                ->references('id')->on('blog_categories')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
