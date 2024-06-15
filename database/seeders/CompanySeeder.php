<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name' => 'Tech Innovators Inc.',
                'description' => 'A leading tech company specializing in innovative solutions.',
                'email' => 'info@techinnovators.com',
                'number' => '123-456-7890',
                'address' => '123 Tech Street, Innovation City, CA',
                'img' => 'path/to/image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Health Solutions Ltd.',
                'description' => 'Providing advanced healthcare solutions and services.',
                'email' => 'contact@healthsolutions.com',
                'number' => '987-654-3210',
                'address' => '456 Health Avenue, Wellness City, NY',
                'img' => 'path/to/image2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Finance Gurus LLC',
                'description' => 'Experts in financial consulting and services.',
                'email' => 'support@financegurus.com',
                'number' => '456-789-0123',
                'address' => '789 Finance Road, Money City, TX',
                'img' => 'path/to/image3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EduTech Solutions',
                'description' => 'Innovative educational technology solutions provider.',
                'email' => 'info@edutech.com',
                'number' => '321-654-0987',
                'address' => '321 Learning Lane, Knowledge City, FL',
                'img' => 'path/to/image4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Retail Masters Corp.',
                'description' => 'Leading company in retail management solutions.',
                'email' => 'contact@retailmasters.com',
                'number' => '654-321-9870',
                'address' => '654 Retail Blvd, Commerce City, IL',
                'img' => 'path/to/image5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Green Energy Co.',
                'description' => 'Pioneers in renewable energy solutions.',
                'email' => 'info@greenenergy.com',
                'number' => '789-012-3456',
                'address' => '987 Green Way, Eco City, OR',
                'img' => 'path/to/image6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more companies as needed
        ]);
    }
}
