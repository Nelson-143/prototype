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
       // Users Table
       Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('username')->nullable()->unique();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone_number')->nullable();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->string('photo')->nullable(); // User profile photo
        $table->rememberToken();
        $table->timestamps();
        $table->softDeletes();
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
