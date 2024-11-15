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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('report_token')->unique();
            $table->text('description');
            $table->string('reporter_email');
            $table->string('owner_name');
            $table->string('owner_email');
            $table->unsignedBigInteger('wallpaper_id');

            $table->foreign("wallpaper_id")->on("wallpapers")->references("id");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
