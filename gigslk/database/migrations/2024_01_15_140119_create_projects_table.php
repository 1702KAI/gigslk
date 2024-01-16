<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained(); // Foreign key to jobs table
            $table->foreignId('freelancer_id')->constrained('users'); // Foreign key to freelancers (users) table
            $table->text('bid_proposal'); // Proposal from the freelancer who won the bid
            $table->string('freelancer_portfolio')->nullable(); // Portfolio of the freelancer
            $table->string('project_owner'); // Information about the owner of the project
            $table->decimal('budget', 10, 2); // Budget for the project
            $table->integer('timeline'); // Timeline for the project
            $table->string('status')->default('active'); // Project status
            // Add more project details as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
