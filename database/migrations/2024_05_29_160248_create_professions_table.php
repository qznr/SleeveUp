<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->timestamps();
        });

        DB::table('professions')->insert([
            [
                'name' => 'Software Engineer',
                'description' => 'Develops and maintains software applications.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Data Scientist',
                'description' => 'Analyzes and interprets complex data to help companies make decisions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Data Engineer',
                'description' => 'Designs, constructs, installs, tests and maintains highly scalable data management systems.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Machine Learning Engineer',
                'description' => 'Designs and develops machine learning and deep learning systems.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Front End Developer',
                'description' => 'Specializes in the development of the user interface for web applications.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Back End Developer',
                'description' => 'Focuses on server-side logic, databases, and ensuring high performance and responsiveness.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Full Stack Developer',
                'description' => 'Handles both front-end and back-end development tasks.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DevOps Engineer',
                'description' => 'Works on automating and streamlining the software development and deployment process.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cybersecurity Specialist',
                'description' => 'Protects systems and networks from cyber threats and ensures data security.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Systems Architect',
                'description' => 'Designs and oversees the implementation of complex computer systems.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Database Administrator',
                'description' => 'Manages and maintains database systems to ensure optimal performance and security.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Network Engineer',
                'description' => 'Designs, implements, and manages computer networks to ensure smooth operation.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cloud Engineer',
                'description' => 'Focuses on designing, deploying, and managing cloud-based infrastructure and services.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IT Support Specialist',
                'description' => 'Provides technical assistance and support for computer systems, software, and hardware.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'UI/UX Designer',
                'description' => 'Designs user interfaces and experiences for digital products to ensure optimal usability.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product Manager',
                'description' => 'Oversees the development and delivery of products, ensuring they meet customer needs and business goals.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quality Assurance Engineer',
                'description' => 'Ensures that software and systems meet quality standards through testing and validation.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobile Developer',
                'description' => 'Specializes in creating applications for mobile devices.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blockchain Developer',
                'description' => 'Develops and maintains blockchain-based applications and systems.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AI Research Scientist',
                'description' => 'Conducts research to advance the field of artificial intelligence.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more professions as needed
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professions');
    }
};
