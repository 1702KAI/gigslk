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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('skills'); // Added skills field
            $table->decimal('budget', 10, 2); // Added budget field as decimal with precision 10 and scale 2
            $table->integer('duration'); // Added duration field as integer
            $table->foreignId('user_id')->constrained(); // Foreign key to tie Job to User
            $table->string('user_email'); // User email
            $table->foreignId('role_id')->constrained(); // Foreign key to tie Job to Role
            $table->string('status')->default('active'); // Added status field with default value 'active'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
