<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Delete existing records to start from scratch
        Job::query()->delete();

        // Get the specified user to associate with the jobs
        $user = User::findOrFail(11); // Assuming you have a user with ID 11

        // Sample job data
        $jobs = [
            // ... (your job data)
        ];

        // Seed the 'jobs' table with sample data
        foreach ($jobs as $jobData) {
            $jobData['user_id'] = $user->id;
            $jobData['user_email'] = $user->email;
            $jobData['role_id'] = $user->role_id;

            Job::create($jobData);
        }
    }
}
