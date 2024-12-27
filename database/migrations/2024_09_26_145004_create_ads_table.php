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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('admob_app_id');
            $table->string('admob_banner');
            $table->string('admob_native');
            $table->string('admob_interstitial');
            $table->string('admob_open');
            $table->string('admob_reward');
            $table->boolean('refresh_stat');
            $table->tinyInteger('interstitial_click')->nullable();
            $table->tinyInteger('native_item')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
