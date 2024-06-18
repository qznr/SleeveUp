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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('event_type');
            $table->string('event_organizer');
            $table->string('presenter');
            $table->text('materials');
            $table->string('description');
            $table->string('location');
            $table->string('time');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('email');
            $table->string('link_website');
            $table->string('link_register');
            $table->string('img')
                  ->default('/img/event/placeholder-image.png');
            $table->timestamps();
        });

        DB::table('events')->insert([
            [
                'name' => 'Seminar Teknologi AI',
                'event_type' => 'Seminar',
                'event_organizer' => 'Fakultas Ilmu Komputer UB',
                'presenter' => 'Rizal Setya Perdana, S.Kom., M.Kom., Ph.D.',
                'materials' => '<ul><li>AI Trends Report 2024</li><li>Presentation Slides</li><li>Research Papers</li></ul>',
                'description' => 'Seminar mengenai perkembangan teknologi AI terkini.',
                'location' => 'Gedung Algoritma Lt. 2',
                'time' => '10:00 - 11:00 WIB',
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-01',
                'instagram' => 'https://instagram.com/seminar_ai',
                'facebook' => 'https://facebook.com/seminar_ai',
                'twitter' => 'https://twitter.com/seminar_ai',
                'email' => 'seminar_ai@ub.ac.id',
                'link_website' => 'https://seminarai.ub.ac.id',
                'link_register' => 'https://seminarai.ub.ac.id/register'
            ],
            [
                'name' => 'Workshop Cyber Security',
                'event_type' => 'Workshop',
                'event_organizer' => 'Fakultas Teknik UB',
                'presenter' => 'Ir. Budi Santoso',
                'materials' => '<ul><li>Cyber Security Basics</li><li>Interactive Labs</li><li>Security Tools</li></ul>',
                'description' => 'Workshop tentang dasar-dasar keamanan siber.',
                'location' => 'Fakultas Teknik UB',
                'time' => '10:00 - 11:00 WIB',
                'start_date' => '2024-07-10',
                'end_date' => '2024-07-12',
                'instagram' => 'https://instagram.com/workshop_cybersecurity',
                'facebook' => 'https://facebook.com/workshop_cybersecurity',
                'twitter' => 'https://twitter.com/workshop_cybersecurity',
                'email' => 'cybersecurity@ub.ac.id',
                'link_website' => 'https://cybersecurity.ub.ac.id',
                'link_register' => 'https://cybersecurity.ub.ac.id/register'
            ],
            [
                'name' => 'Konferensi Sistem Informasi',
                'event_type' => 'Konferensi',
                'event_organizer' => 'Fakultas Ilmu Komputer UB',
                'presenter' => 'Prof. Dina Kartika',
                'materials' => '<ul><li>Conference Proceedings</li><li>Keynote Speaker Slides</li><li>Workshop Handouts</li></ul>',
                'description' => 'Konferensi tahunan mengenai perkembangan sistem informasi.',
                'location' => 'Aula Fakultas Ilmu Komputer UB',
                'time' => '10:00 - 11:00 WIB',
                'start_date' => '2024-08-15',
                'end_date' => '2024-08-17',
                'instagram' => 'https://instagram.com/konferensi_sisteminformasi',
                'facebook' => 'https://facebook.com/konferensi_sisteminformasi',
                'twitter' => 'https://twitter.com/konferensi_si',
                'email' => 'konferensi_si@ub.ac.id',
                'link_website' => 'https://konferensisi.ub.ac.id',
                'link_register' => 'https://konferensisi.ub.ac.id/register'
            ],
            [
                'name' => 'Hackathon UB 2024',
                'event_type' => 'Kompetisi',
                'event_organizer' => 'Himpunan Mahasiswa Ilmu Komputer UB',
                'presenter' => 'Tim Juri Hackathon UB',
                'materials' => '<ul><li>Hackathon Rules</li><li>API Documentation</li><li>Team Submission Guidelines</li></ul>',
                'description' => 'Kompetisi pengembangan aplikasi dalam waktu 24 jam.',
                'location' => 'Fakultas Ilmu Komputer UB',
                'time' => '10:00 - 11:00 WIB',
                'start_date' => '2024-09-01',
                'end_date' => '2024-09-02',
                'instagram' => 'https://instagram.com/hackathon_ub',
                'facebook' => 'https://facebook.com/hackathon_ub',
                'twitter' => 'https://twitter.com/hackathon_ub',
                'email' => 'hackathon@ub.ac.id',
                'link_website' => 'https://hackathon.ub.ac.id',
                'link_register' => 'https://hackathon.ub.ac.id/register'
            ],
            [
                'name' => 'Pelatihan Pemrograman Python',
                'event_type' => 'Pelatihan',
                'event_organizer' => 'Laboratorium Komputer UB',
                'presenter' => 'Andi Wijaya, M.Kom.',
                'materials' => '<ul><li>Python Tutorial</li><li>Sample Code</li><li>Practice Exercises</li></ul>',
                'description' => 'Pelatihan dasar pemrograman Python untuk pemula.',
                'location' => 'Lab Komputer UB',
                'time' => '10:00 - 11:00 WIB',
                'start_date' => '2024-07-05',
                'end_date' => '2024-07-07',
                'instagram' => 'https://instagram.com/pelatihan_python',
                'facebook' => 'https://facebook.com/pelatihan_python',
                'twitter' => 'https://twitter.com/pelatihan_python',
                'email' => 'pelatihan_python@ub.ac.id',
                'link_website' => 'https://pelatihanpython.ub.ac.id',
                'link_register' => 'https://pelatihanpython.ub.ac.id/register'
            ],
            [
                'name' => 'Seminar Big Data',
                'event_type' => 'Seminar',
                'event_organizer' => 'Fakultas Ekonomi dan Bisnis UB',
                'presenter' => 'Dr. Maya Setiawan',
                'materials' => '<ul><li>Big Data Analysis Report</li><li>Presentation Slides</li><li>Case Studies</li></ul>',
                'description' => 'Seminar mengenai pengolahan data besar dalam bisnis.',
                'location' => 'Gedung Fakultas Ekonomi UB',
                'time' => '10:00 - 11:00 WIB',
                'start_date' => '2024-08-05',
                'end_date' => '2024-08-05',
                'instagram' => 'https://instagram.com/seminar_bigdata',
                'facebook' => 'https://facebook.com/seminar_bigdata',
                'twitter' => 'https://twitter.com/seminar_bigdata',
                'email' => 'seminar_bigdata@ub.ac.id',
                'link_website' => 'https://bigdata.ub.ac.id',
                'link_register' => 'https://bigdata.ub.ac.id/register'
            ],
            [
                'name' => 'Lokakarya IoT',
                'event_type' => 'Lokakarya',
                'event_organizer' => 'Fakultas Teknik Elektro UB',
                'presenter' => 'Ir. Agus Prasetyo',
                'materials' => '<ul><li>IoT Basics Guide</li><li>Workshop Projects</li><li>Hardware Requirements</li></ul>',
                'description' => 'Lokakarya tentang Internet of Things dan implementasinya.',
                'location' => 'Gedung Teknik Elektro UB',
                'time' => '10:00 - 11:00 WIB',
                'start_date' => '2024-07-20',
                'end_date' => '2024-07-22',
                'instagram' => 'https://instagram.com/lokakarya_iot',
                'facebook' => 'https://facebook.com/lokakarya_iot',
                'twitter' => 'https://twitter.com/lokakarya_iot',
                'email' => 'lokakarya_iot@ub.ac.id',
                'link_website' => 'https://iot.ub.ac.id',
                'link_register' => 'https://iot.ub.ac.id/register'
            ],
            [
                'name' => 'Pelatihan Machine Learning',
                'event_type' => 'Pelatihan',
                'event_organizer' => 'Pusat Studi AI UB',
                'presenter' => 'Dr. Rina Andayani',
                'materials' => '<ul><li>Machine Learning Introduction</li><li>Sample Datasets</li><li>Code Samples</li></ul>',
                'description' => 'Pelatihan dasar machine learning untuk akademisi.',
                'location' => 'Lab AI UB',
                'time' => '10:00 - 11:00 WIB',
                'start_date' => '2024-09-10',
                'end_date' => '2024-09-12',
                'instagram' => 'https://instagram.com/pelatihan_ml',
                'facebook' => 'https://facebook.com/pelatihan_ml',
                'twitter' => 'https://twitter.com/pelatihan_ml',
                'email' => 'pelatihan_ml@ub.ac.id',
                'link_website' => 'https://ml.ub.ac.id',
                'link_register' => 'https://ml.ub.ac.id/register'
            ],
            [
                'name' => 'Konferensi Jaringan Komputer',
                'event_type' => 'Konferensi',
                'event_organizer' => 'Fakultas Ilmu Komputer UB',
                'presenter' => 'Prof. Bambang Suprapto',
                'materials' => '<ul><li>Conference Papers</li><li>Workshop Materials</li><li>Network Security Guide</li></ul>',
                'description' => 'Konferensi internasional tentang jaringan komputer dan keamanan.',
                'location' => 'Gedung Informatika UB',
                'time' => '10:00 - 11:00 WIB',
                'start_date' => '2024-10-05',
                'end_date' => '2024-10-07',
                'instagram' => 'https://instagram.com/konferensi_jarkom',
                'facebook' => 'https://facebook.com/konferensi_jarkom',
                'twitter' => 'https://twitter.com/konferensi_jarkom',
                'email' => 'konferensi_jarkom@ub.ac.id',
                'link_website' => 'https://jarkom.ub.ac.id',
                'link_register' => 'https://jarkom.ub.ac.id/register'
            ],
            [
                'name' => 'Seminar Data Science',
                'event_type' => 'Seminar',
                'event_organizer' => 'Fakultas Ilmu Komputer UB',
                'presenter' => 'Dr. Yuni Astuti',
                'materials' => '<ul><li>Data Science Handbook</li><li>Case Studies</li><li>Presentation Slides</li></ul>',
                'description' => 'Seminar tentang analisis data dan penerapannya di berbagai bidang.',
                'location' => 'Aula Fakultas Ilmu Komputer UB',
                'time' => '10:00 - 11:00 WIB',
                'start_date' => '2024-11-15',
                'end_date' => '2024-11-15',
                'instagram' => 'https://instagram.com/seminar_datascience',
                'facebook' => 'https://facebook.com/seminar_datascience',
                'twitter' => 'https://twitter.com/seminar_datascience',
                'email' => 'seminar_datascience@ub.ac.id',
                'link_website' => 'https://datascience.ub.ac.id',
                'link_register' => 'https://datascience.ub.ac.id/register'
            ]
        ]);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
