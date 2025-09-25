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
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id', 50)->primary();
            $table->string('firstname', 150)->nullable();
            $table->string('othername', 150)->nullable();
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('access_level')->nullable();
            $table->string('is_admin')->nullable()->default(false);
            $table->string('is_blocked', 20)->default(false);
            $table->timestamp('blocked_at')->nullable();
            $table->string('blocked_by', 50)->nullable();
            $table->string('email_verified')->default('No');
            $table->timestamp('added_date')->nullable();
            $table->string('status', 50)->default('Active')->index();
            $table->string('archived', 50)->default('No')->index();
            $table->string('archived_id', 50)->nullable();
            $table->string('archived_by', 50)->nullable();
            $table->date('archived_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
