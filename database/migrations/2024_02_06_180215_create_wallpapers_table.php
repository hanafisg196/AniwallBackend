<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wallpapers', function (Blueprint $table) {
       
            $table->id();
            $table->string('title', 300);
            $table->string('thumbnail', 300);
            $table->string('type', 20);
            $table->string('size', 50);
            $table->integer('view')->nullable();
            $table->integer('download')->nullable();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign("cat_id")->on("categories")->references("id");
            $table->foreign("user_id")->on("users")->references("id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallpapers');
    }
};
