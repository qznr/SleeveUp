<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_offers')->insert([
            [
                'profession_id' => 1,
                'company_id' => 1,
                'description' => 'Looking for a skilled software engineer to join our team.',
                'salary' => '100000',
                'requirement' => '3+ years of experience in software development.',
                'is_remote' => 'yes',
                'type' => 'full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 2,
                'company_id' => 2,
                'description' => 'Seeking a data scientist with experience in machine learning.',
                'salary' => '120000',
                'requirement' => '5+ years of experience in data science.',
                'is_remote' => 'no',
                'type' => 'contract',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 3,
                'company_id' => 3,
                'description' => 'Data Engineer needed to manage large data sets.',
                'salary' => '110000',
                'requirement' => '4+ years of experience in data engineering.',
                'is_remote' => 'yes',
                'type' => 'full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 4,
                'company_id' => 4,
                'description' => 'Machine Learning Engineer for developing AI solutions.',
                'salary' => '130000',
                'requirement' => '3+ years of experience in ML.',
                'is_remote' => 'no',
                'type' => 'full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 5,
                'company_id' => 5,
                'description' => 'Front End Developer with a keen eye for design.',
                'salary' => '90000',
                'requirement' => '2+ years of experience in front-end development.',
                'is_remote' => 'yes',
                'type' => 'contract',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 6,
                'company_id' => 6,
                'description' => 'Back End Developer to manage our server-side logic.',
                'salary' => '95000',
                'requirement' => '3+ years of experience in back-end development.',
                'is_remote' => 'no',
                'type' => 'full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 7,
                'company_id' => 1,
                'description' => 'Full Stack Developer needed for diverse projects.',
                'salary' => '115000',
                'requirement' => '4+ years of experience in full stack development.',
                'is_remote' => 'yes',
                'type' => 'contract',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 8,
                'company_id' => 2,
                'description' => 'DevOps Engineer to streamline our processes.',
                'salary' => '105000',
                'requirement' => '3+ years of experience in DevOps.',
                'is_remote' => 'no',
                'type' => 'full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 9,
                'company_id' => 3,
                'description' => 'Cybersecurity Specialist to protect our data.',
                'salary' => '125000',
                'requirement' => '5+ years of experience in cybersecurity.',
                'is_remote' => 'yes',
                'type' => 'contract',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 10,
                'company_id' => 4,
                'description' => 'Systems Architect to design complex systems.',
                'salary' => '140000',
                'requirement' => '6+ years of experience in system architecture.',
                'is_remote' => 'no',
                'type' => 'full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more job offers as needed
        ]);
    }
}
