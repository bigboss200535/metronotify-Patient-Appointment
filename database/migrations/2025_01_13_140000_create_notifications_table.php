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
        Schema::create('notifications', function (Blueprint $table) {
            $table->string('notification_id')->primary();
            $table->string('user_id');
            $table->string('type');
            $table->string('title');
            $table->text('message');
            $table->string('related_id')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamp('created_at')->nullable();
            
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->index(['user_id', 'is_read']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
