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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id', 50);
            $table->string('fullname', 150)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('service', 50)->nullable();
            $table->text('message')->nullable();
            $table->string('appointment_mode', 50)->nullable();
            $table->string('doctor_id', 50)->nullable();
            $table->string('appointment_status', 50)->nullable();
            $table->timestamp('appointment_date')->nullable();
            $table->timestamp('appointment_time')->nullable();
            $table->string('confirmation', 50)->nullable();
            $table->string('confirmation_id', 50)->nullable();
            $table->string('added_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 100)->default('Active')->index();
            $table->string('archived', 100)->default('No')->index();
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date')->nullable();

              // key
            $table->foreign('doctor_id')->references('user_id')->on('users');
            $table->foreign('confirmation_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
