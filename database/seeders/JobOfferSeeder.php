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
                'description' => 'Looking for a skilled software engineer to join our innovative team.',
                'full_description' => 'We are seeking a passionate software engineer to work on exciting projects and develop innovative solutions. You will collaborate with a talented team and have the opportunity to grow your skills through continuous learning and development. Your main responsibilities include:
                <ul>
                    <li>Designing and implementing software solutions to meet business requirements.</li>
                    <li>Collaborating with cross-functional teams to define and develop new features.</li>
                    <li>Maintaining code quality through testing and code reviews.</li>
                    <li>Staying up-to-date with the latest industry trends and technologies.</li>
                </ul>',
                'salary' => '100000',
                'requirement' => '<ul>
                    <li>Minimum of 3+ years of hands-on experience in software development, with a strong focus on object-oriented design and programming.</li>
                    <li>Proficiency in one or more of the following programming languages: Java, C#, Python, or JavaScript.</li>
                    <li>Strong understanding of software development methodologies, including Agile and Scrum.</li>
                    <li>Experience with version control systems, particularly Git.</li>
                    <li>Bachelor’s degree in Computer Science, Engineering, or a related field; or equivalent practical experience.</li>
                    <li>Demonstrated ability to stay current with the latest industry trends and technologies.</li>
                </ul>',
                'is_remote' => 'yes',
                'type' => 'full-time',
                'benefits' => '<ul>
                    <li>Health insurance</li>
                    <li>401(k) retirement plan</li>
                    <li>Flexible remote work options</li>
                    <li>Opportunities for professional development and career growth</li>
                </ul>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 2,
                'company_id' => 2,
                'description' => 'Seeking a data scientist with expertise in machine learning to join our forward-thinking team.',
                'full_description' => 'Join our team as a data scientist and leverage your machine learning expertise to solve complex problems. You will work on cutting-edge projects and contribute to our data-driven decision-making process. Key responsibilities include:
                <ul>
                    <li>Developing and deploying machine learning models to address business challenges.</li>
                    <li>Collaborating with data engineers and analysts to ensure data quality and availability.</li>
                    <li>Conducting thorough data analysis and presenting insights to stakeholders.</li>
                    <li>Keeping up-to-date with advancements in machine learning and data science techniques.</li>
                </ul>',
                'salary' => '120000',
                'requirement' => '<ul>
                    <li>Minimum of 5+ years of experience in data science, with a focus on machine learning and statistical modeling.</li>
                    <li>Proficiency in programming languages such as Python, R, or Java, with a strong understanding of data manipulation and analysis libraries (e.g., pandas, numpy, scikit-learn).</li>
                    <li>Experience with deep learning frameworks such as TensorFlow, Keras, or PyTorch.</li>
                    <li>Demonstrated experience in building and deploying machine learning models in a production environment.</li>
                    <li>Familiarity with big data technologies and platforms such as Hadoop, Spark, or Apache Flink.</li>
                    <li>Ability to work with large, complex datasets and perform data wrangling, cleaning, and preprocessing.</li>
                    <li>Excellent communication skills, with the ability to present complex technical concepts to non-technical stakeholders.</li>
                    <li>Bachelor’s or Master’s degree in Data Science, Computer Science, Statistics, Mathematics, or a related field; or equivalent practical experience.</li>
                </ul>',
                'is_remote' => 'no',
                'type' => 'contract',
                'benefits' => '<ul>
                    <li>Flexible working hours</li>
                    <li>Comprehensive health insurance</li>
                    <li>Opportunities for career growth and development</li>
                </ul>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 3,
                'company_id' => 3,
                'description' => 'Data Engineer needed to manage and optimize large data sets.',
                'full_description' => 'We are looking for a data engineer who can handle large data sets and optimize our data infrastructure. You will be responsible for ensuring data quality and availability for our analytics team. Your primary duties include:
                <ul>
                    <li>Building and maintaining scalable data pipelines.</li>
                    <li>Ensuring the reliability and performance of our data infrastructure.</li>
                    <li>Collaborating with data scientists and analysts to meet their data needs.</li>
                    <li>Implementing data governance and security best practices.</li>
                </ul>',
                'salary' => '110000',
                'requirement' => '<ul>
                    <li>Minimum of 4+ years of experience in data engineering, with a strong emphasis on building and managing data pipelines.</li>
                    <li>Proficiency in programming languages such as Python, Java, or Scala.</li>
                    <li>Experience with distributed data processing frameworks like Apache Spark, Hadoop, or Flink.</li>
                    <li>Strong understanding of ETL (Extract, Transform, Load) processes and data integration techniques.</li>
                    <li>Experience with cloud data platforms such as AWS (e.g., Redshift, EMR), Azure (e.g., Synapse), or Google Cloud (e.g., BigQuery).</li>
                    <li>Proven experience with SQL and NoSQL databases, such as MySQL, PostgreSQL, Cassandra, or MongoDB.</li>
                    <li>Ability to design and implement data models and schemas for efficient data storage and retrieval.</li>
                    <li>Familiarity with data warehousing concepts and technologies.</li>
                    <li>Experience with data pipeline orchestration tools such as Apache Airflow, Luigi, or similar.</li>
                    <li>Strong problem-solving skills and the ability to troubleshoot complex data-related issues.</li>
                    <li>Excellent communication skills, with the ability to work effectively with cross-functional teams and stakeholders.</li>
                    <li>Understanding of data governance, data security, and compliance requirements.</li>
                    <li>Ability to write clean, efficient, and maintainable code.</li>
                    <li>Experience with version control systems such as Git.</li>
                    <li>Ability to work effectively in both remote and collaborative team environments.</li>
                    <li>Bachelor’s or Master’s degree in Computer Science, Engineering, Information Systems, or a related field; or equivalent practical experience.</li>
                    <li>Demonstrated ability to stay current with the latest industry trends and technologies in data engineering.</li>
                    <li>Strong attention to detail and a commitment to delivering high-quality solutions.</li>
                </ul>',
                'is_remote' => 'yes',
                'type' => 'full-time',
                'benefits' => '<ul>
                    <li>Remote work options</li>
                    <li>Health insurance</li>
                    <li>Professional development opportunities</li>
                </ul>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 4,
                'company_id' => 4,
                'description' => 'Machine Learning Engineer for developing innovative AI solutions.',
                'full_description' => 'Join our team as a machine learning engineer and contribute to developing state-of-the-art AI solutions. You will work on innovative projects and collaborate with a team of experts. Key responsibilities include:
                <ul>
                    <li>Designing and implementing machine learning algorithms and models.</li>
                    <li>Working with large datasets to train and evaluate models.</li>
                    <li>Collaborating with software engineers to integrate ML solutions into products.</li>
                    <li>Staying current with advancements in AI and machine learning technologies.</li>
                </ul>',
                'salary' => '130000',
                'requirement' => '3+ years of experience in ML.',
                'is_remote' => 'no',
                'type' => 'full-time',
                'benefits' => '<ul>
                    <li>Comprehensive health insurance</li>
                    <li>Gym membership</li>
                    <li>Professional growth opportunities</li>
                </ul>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 5,
                'company_id' => 5,
                'description' => 'Front End Developer with a keen eye for design and user experience.',
                'full_description' => 'We are looking for a front end developer who has a strong sense of design and can create beautiful user interfaces. You will work closely with the design team to bring ideas to life. Your main tasks include:
                <ul>
                    <li>Developing responsive and visually appealing web applications.</li>
                    <li>Collaborating with designers to create seamless user experiences.</li>
                    <li>Ensuring the technical feasibility of UI/UX designs.</li>
                    <li>Optimizing applications for maximum speed and scalability.</li>
                </ul>',
                'salary' => '90000',
                'requirement' => '2+ years of experience in front-end development.',
                'is_remote' => 'yes',
                'type' => 'contract',
                'benefits' => '<ul>
                    <li>Remote work options</li>
                    <li>Flexible working hours</li>
                    <li>Creative and collaborative environment</li>
                </ul>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 6,
                'company_id' => 6,
                'description' => 'Back End Developer to manage our server-side logic and infrastructure.',
                'full_description' => 'As a back end developer, you will be responsible for developing and maintaining our server-side logic. You will ensure the performance and reliability of our applications. Key responsibilities include:
                <ul>
                    <li>Designing and implementing server-side applications and APIs.</li>
                    <li>Optimizing server performance and scalability.</li>
                    <li>Collaborating with front end developers to integrate user-facing elements.</li>
                    <li>Maintaining and improving the security of our applications.</li>
                </ul>',
                'salary' => '95000',
                'requirement' => '3+ years of experience in back-end development.',
                'is_remote' => 'no',
                'type' => 'full-time',
                'benefits' => '<ul>
                    <li>Health insurance</li>
                    <li>Stock options</li>
                    <li>On-site amenities</li>
                </ul>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 7,
                'company_id' => 1,
                'description' => 'Full Stack Developer needed for diverse and challenging projects.',
                'full_description' => 'We need a full stack developer who is versatile and can handle both front-end and back-end development. You will work on a variety of projects and collaborate with a talented team. Main duties include:
                <ul>
                    <li>Designing and developing end-to-end web applications.</li>
                    <li>Ensuring the performance and scalability of applications.</li>
                    <li>Collaborating with designers and other developers to create cohesive products.</li>
                    <li>Maintaining and improving existing codebases.</li>
                </ul>',
                'salary' => '115000',
                'requirement' => '4+ years of experience in full stack development.',
                'is_remote' => 'yes',
                'type' => 'contract',
                'benefits' => '<ul>
                    <li>Remote work opportunities</li>
                    <li>Variety of projects to work on</li>
                    <li>Career growth and development</li>
                </ul>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 8,
                'company_id' => 2,
                'description' => 'DevOps Engineer to streamline our development and deployment processes.',
                'full_description' => 'Join our team as a DevOps engineer and help streamline our development and deployment processes. You will ensure smooth and efficient operations across all stages of development. Key responsibilities include:
                <ul>
                    <li>Implementing and managing CI/CD pipelines.</li>
                    <li>Monitoring and maintaining infrastructure and application performance.</li>
                    <li>Collaborating with development teams to improve software delivery processes.</li>
                    <li>Ensuring security and compliance throughout the development lifecycle.</li>
                </ul>',
                'salary' => '105000',
                'requirement' => '3+ years of experience in DevOps.',
                'is_remote' => 'no',
                'type' => 'full-time',
                'benefits' => '<ul>
                    <li>Health insurance</li>
                    <li>Career growth opportunities</li>
                    <li>On-site amenities</li>
                </ul>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 9,
                'company_id' => 3,
                'description' => 'Cybersecurity Specialist to protect our data and systems.',
                'full_description' => 'We are seeking a cybersecurity specialist to safeguard our data and systems. You will implement security measures and respond to security incidents to protect our assets. Primary duties include:
                <ul>
                    <li>Developing and implementing security policies and procedures.</li>
                    <li>Conducting regular security audits and risk assessments.</li>
                    <li>Monitoring network traffic for suspicious activity.</li>
                    <li>Responding to and mitigating security incidents.</li>
                </ul>',
                'salary' => '125000',
                'requirement' => '5+ years of experience in cybersecurity.',
                'is_remote' => 'yes',
                'type' => 'contract',
                'benefits' => '<ul>
                    <li>Remote work options</li>
                    <li>Health insurance</li>
                    <li>Professional development opportunities</li>
                </ul>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profession_id' => 10,
                'company_id' => 4,
                'description' => 'Systems Architect to design and oversee complex systems.',
                'full_description' => 'As a systems architect, you will design and oversee the implementation of complex systems. You will work with various stakeholders to ensure the systems meet business requirements. Key responsibilities include:
                <ul>
                    <li>Designing system architecture that aligns with business goals.</li>
                    <li>Overseeing the implementation of system components.</li>
                    <li>Ensuring system scalability, security, and performance.</li>
                    <li>Collaborating with project managers and other engineers.</li>
                </ul>',
                'salary' => '140000',
                'requirement' => '6+ years of experience in system architecture.',
                'is_remote' => 'no',
                'type' => 'full-time',
                'benefits' => '<ul>
                    <li>Health insurance</li>
                    <li>Retirement plan</li>
                    <li>On-site amenities</li>
                </ul>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more job offers as needed
        ]);
    }
}
