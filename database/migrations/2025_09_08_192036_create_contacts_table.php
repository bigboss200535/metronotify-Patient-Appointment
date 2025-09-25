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
        Schema::create('enquiry', function (Blueprint $table) {
            $table->id('enquiry_id', 50);
            $table->string('fullname', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('subject', 200)->nullable();
            $table->string('service', 100)->nullable();
            $table->text('message')->nullable();
            $table->string('read_status', 50)->default('No');
            $table->string('page_name', 50)->nullable();
            $table->string('page_type', 50)->nullable();
            $table->string('replied', 50)->default('No');
            $table->string('replied_id', 50)->nullable();
            $table->date('added_date', 50)->nullable();
            $table->string('status', 50)->default('Active')->index();
            $table->string('archived', 50)->default('No')->index();
            $table->string('archived_id', 50)->nullable();
            $table->string('archived_by', 50)->nullable();
            $table->date('archived_date')->nullable();

            //key 
            // $table->foreign('replied_id')->references('user_id')->on('users');
            // Foreign key
            $table->foreign('replied_id')->references('user_id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiry');
    }
};
