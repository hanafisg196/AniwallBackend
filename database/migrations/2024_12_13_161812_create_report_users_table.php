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
        Schema::create('report_users', function (Blueprint $table) {
            $table->id();
            $table->text("description");
            $table->string("reporter_email");
            $table->string("user_name");
            $table->string("user_email");
            $table->string("report_token");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_users');
    }
};
