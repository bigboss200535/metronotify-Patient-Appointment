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
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
           $table->string('added_id', 50)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('status', 50)->default('Active')->index();
            $table->string('archived', 50)->default('No')->index();
            $table->string('archived_id', 50)->nullable();
            $table->string('archived_by', 50)->nullable();
            $table->date('archived_date')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms');
    }
};
