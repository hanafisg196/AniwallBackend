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
            $table->string('thumbnail', 300)->nullable();
            $table->string('type', 300)->nullable();
            $table->string('resolution', 50)->nullable();
            $table->integer('view')->default(0);
            $table->integer('download')->default(0);
            $table->tinyInteger('premium')->default(0);
            $table->tinyInteger('review')->default(0);
            $table->tinyInteger('enabled')->default(0);
            $table->string('size')->nullable();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            
            $table->foreign("cat_id")->on("categories")->references("id");
            $table->foreign("user_id")->on("users")->references("id");
            
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
