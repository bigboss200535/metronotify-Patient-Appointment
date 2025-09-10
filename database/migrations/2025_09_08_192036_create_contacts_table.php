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
        Schema::create('web_contacts', function (Blueprint $table) {
            $table->string('contact_id', 50)->primary();
            $table->string('name', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('email', 200)->unique()->nullable();
            $table->string('subject', 200)->unique();
            $table->string('message')->nullable();
            $table->string('read_status', 50)->default('No');
            $table->string('replied', 50)->default('No');
            $table->string('replied_id', 50)->nullable();
            $table->string('status', 50)->default('Active')->index();
            $table->string('archived', 50)->default('No')->index();
            $table->string('archived_id', 50)->nullable();
            $table->string('archived_by', 50)->nullable();
            $table->date('archived_date')->nullable();

            //key 
            $table->foreign('replied_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
