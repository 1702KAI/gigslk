<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Clear existing records to start from scratch
        Job::truncate();

        // Seed the 'jobs' table with sample data
        Job::create([
            'title' => 'Software Engineer',
            'description' => 'We are looking for a skilled software engineer...',
        ]);

        Job::create([
            'title' => 'Web Developer',
            'description' => 'Join our web development team and contribute to...',
        ]);

        // Add more seed data as needed
    }
}
