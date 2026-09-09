<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('our_teams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->string('image')->nullable();
            $table->string('designation')->nullable(); // Additional field example
            $table->integer('display_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes(); // Optional: for soft delete functionality
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('our_teams');
    }
};