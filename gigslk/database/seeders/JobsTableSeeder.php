<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User; // Make sure to import the User model

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Clear existing records to start from scratch
        Job::truncate();

        // Get an example user to associate with the jobs
        $user = User::first(); // You might want to change this to get a specific user

        // Sample job data
        $jobs = [
            [
                'title' => 'Software Engineer',
                'description' => 'We are looking for a skilled software engineer...',
                'skills' => 'PHP, Laravel, JavaScript',
                'budget' => 5000.00,
                'duration' => 30,
                'status' => 'active',
            ],
            [
                'title' => 'Web Developer',
                'description' => 'Join our web development team and contribute to...',
                'skills' => 'HTML, CSS, React',
                'budget' => 3000.00,
                'duration' => 20,
            ],
            [
                'title' => 'Lead Mobile App Developer',
                'description' => 'We are seeking an experienced mobile app developer to lead our dynamic team...',
                'skills' => 'iOS, Android, Swift, Kotlin',
                'budget' => 8000.00,
                'duration' => 45,
            ],
            [
                'title' => 'UX/UI Design Specialist',
                'description' => 'Join our design team to create beautiful and intuitive user experiences...',
                'skills' => 'UI/UX, Figma, Adobe XD',
                'budget' => 5500.00,
                'duration' => 25,
            ],
            [
                'title' => 'Data Science Researcher',
                'description' => 'We are looking for a data science enthusiast to conduct groundbreaking research in artificial intelligence...',
                'skills' => 'Python, Machine Learning, TensorFlow',
                'budget' => 7000.00,
                'duration' => 40,
            ],
            // Add more creative seed data
            [
                'title' => 'Digital Marketing Guru',
                'description' => 'Join our marketing team and revolutionize our digital presence...',
                'skills' => 'SEO, Social Media Marketing, Content Creation',
                'budget' => 4500.00,
                'duration' => 30,
            ],
            // Add more seed data as needed
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
