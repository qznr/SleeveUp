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
                'description' => 'Tech Innovators Inc. is a forefront technology company dedicated to developing and providing cutting-edge solutions that drive innovation across various industries. Our mission is to harness the power of technology to solve complex problems and create opportunities for businesses and individuals alike. 
        
        With a team of highly skilled engineers, developers, and visionaries, we specialize in artificial intelligence, machine learning, blockchain technology, and IoT. Our products and services range from intelligent software solutions to robust hardware systems designed to enhance efficiency, productivity, and security. 
        
        We take pride in our collaborative approach, working closely with clients to understand their unique challenges and tailor solutions that deliver real value. Our commitment to excellence and continuous improvement ensures that we stay ahead of the technological curve, providing our clients with the tools they need to succeed in an ever-evolving digital landscape.',
                'email' => 'info@techinnovators.com',
                'number' => '123-456-7890',
                'address' => '123 Tech Street, Innovation City, CA',
                'img' => '/img/company/logo-placeholder.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Health Solutions Ltd.',
                'description' => 'Health Solutions Ltd. is a leading provider of advanced healthcare solutions and services designed to improve patient outcomes and streamline healthcare operations. Our comprehensive suite of products includes state-of-the-art medical devices, innovative software applications, and personalized health management services.
        
        At Health Solutions Ltd., we believe in the power of technology to transform healthcare delivery. Our team of medical experts, software engineers, and research scientists work together to develop solutions that address the most pressing challenges in healthcare, from chronic disease management to telemedicine. 
        
        Our flagship products include an integrated health management platform that enables real-time patient monitoring, remote diagnostics, and data-driven decision-making. Additionally, we offer a range of medical devices that are FDA-approved and CE-certified, ensuring the highest standards of safety and efficacy.
        
        We are committed to making healthcare more accessible, efficient, and effective through our relentless pursuit of innovation and excellence.',
                'email' => 'contact@healthsolutions.com',
                'number' => '987-654-3210',
                'address' => '456 Health Avenue, Wellness City, NY',
                'img' => '/img/company/logo-placeholder.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Finance Gurus LLC',
                'description' => 'Finance Gurus LLC is a premier financial consulting and services firm that offers expert guidance and innovative solutions to help businesses and individuals achieve their financial goals. With a deep understanding of the financial markets and a commitment to client success, we provide a comprehensive range of services, including financial planning, investment management, and risk assessment.
        
        Our team of seasoned financial advisors and analysts works closely with clients to develop customized strategies that address their unique financial needs and objectives. Whether you are looking to grow your wealth, manage your assets, or navigate complex financial regulations, Finance Gurus LLC has the expertise and resources to help you succeed.
        
        In addition to our consulting services, we offer a suite of digital tools and platforms designed to enhance financial decision-making and streamline operations. Our cutting-edge technology solutions include automated investment platforms, financial analytics software, and secure online banking services.
        
        At Finance Gurus LLC, we are dedicated to providing unparalleled service and delivering results that exceed expectations.',
                'email' => 'support@financegurus.com',
                'number' => '456-789-0123',
                'address' => '789 Finance Road, Money City, TX',
                'img' => '/img/company/logo-placeholder.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EduTech Solutions',
                'description' => 'EduTech Solutions is at the forefront of the educational technology revolution, providing innovative solutions that enhance learning experiences and outcomes. Our mission is to transform education through the power of technology, making it more accessible, engaging, and effective for learners of all ages.
        
        Our diverse portfolio of products includes adaptive learning platforms, virtual classrooms, and digital content creation tools. These solutions are designed to support educators in delivering personalized, interactive, and data-driven instruction that meets the needs of each student. 
        
        We collaborate with schools, universities, and educational institutions worldwide to implement and integrate our technologies into their curriculums. Our team of educators, technologists, and researchers continuously explores new ways to leverage emerging technologies, such as artificial intelligence and virtual reality, to create immersive learning environments.
        
        EduTech Solutions is committed to fostering a culture of innovation and excellence in education, empowering learners to reach their full potential in an ever-changing world.',
                'email' => 'info@edutech.com',
                'number' => '321-654-0987',
                'address' => '321 Learning Lane, Knowledge City, FL',
                'img' => '/img/company/logo-placeholder.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Retail Masters Corp.',
                'description' => 'Retail Masters Corp. is a leader in retail management solutions, offering a comprehensive suite of products and services designed to optimize retail operations and enhance customer experiences. Our solutions include inventory management systems, point-of-sale (POS) software, customer relationship management (CRM) tools, and e-commerce platforms.
        
        At Retail Masters Corp., we understand the dynamic nature of the retail industry and the challenges retailers face in a highly competitive market. Our team of industry experts and technology professionals work tirelessly to develop solutions that streamline operations, improve efficiency, and drive sales growth.
        
        We pride ourselves on our customer-centric approach, providing tailored solutions that meet the unique needs of each client. Our cutting-edge technologies enable retailers to gain valuable insights into consumer behavior, manage inventory effectively, and deliver exceptional customer service.
        
        Retail Masters Corp. is committed to helping retailers succeed in a rapidly evolving landscape, ensuring they remain agile, responsive, and profitable.',
                'email' => 'contact@retailmasters.com',
                'number' => '654-321-9870',
                'address' => '654 Retail Blvd, Commerce City, IL',
                'img' => '/img/company/logo-placeholder.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Green Energy Co.',
                'description' => 'Green Energy Co. is a pioneer in renewable energy solutions, dedicated to developing sustainable technologies that reduce carbon footprints and promote environmental stewardship. Our mission is to provide clean, reliable, and affordable energy solutions that drive the transition to a greener future.
        
        Our portfolio includes solar power systems, wind energy solutions, energy storage technologies, and electric vehicle (EV) charging infrastructure. We work with businesses, governments, and communities to implement these solutions, helping them reduce their reliance on fossil fuels and lower their energy costs.
        
        Green Energy Co. is committed to innovation and excellence, continuously researching and developing new technologies that push the boundaries of what is possible in renewable energy. Our team of engineers, scientists, and environmental experts collaborates closely to design and deliver solutions that are both efficient and sustainable.
        
        We believe that by empowering individuals and organizations to adopt renewable energy, we can make a significant impact on global sustainability and create a cleaner, healthier planet for future generations.',
                'email' => 'info@greenenergy.com',
                'number' => '789-012-3456',
                'address' => '987 Green Way, Eco City, OR',
                'img' => '/img/company/logo-placeholder.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more companies as needed
        ]);
    }
}
