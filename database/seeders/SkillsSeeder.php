<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    public function run()
    {
        $skills = [
            'Laravel',
            'Angular',
            'React',
            'Vue',
            'Django',
            'Flask',
            'SpringBoot',
            'Hibernate',
            'Docker',
            'Kubernetes',
            'JavaScript',
            'TypeScript',
            'Python',
            'Java',
            'C#',
            'Ruby',
            'PHP',
            'Go',
            'Swift',
            'Kotlin',
            'HTML',
            'CSS',
            'SQL',
            'NoSQL',
            'GraphQL',
            'RESTful APIs',
            'Machine Learning',
            'Data Science',
            'DevOps',
            'Cloud Computing',
            'AWS',
            'Azure',
            'Google Cloud',
            'Microservices',
            'Agile Methodologies',
            'Scrum',
            'Kanban',
            'Version Control (Git)',
            'CI/CD',
            'Unit Testing',
            'TDD',
            'Behavior-Driven Development (BDD)',
            'UI/UX Design',
            'Mobile Development',
            'Game Development',
            'Cybersecurity',
            'Blockchain',
            'Internet of Things (IoT)',
            'Big Data',
            'Data Visualization',
            'Natural Language Processing (NLP)',
            'Computer Vision',
            'Virtual Reality (VR)',
            'Augmented Reality (AR)',
            'Project Management',
            'Technical Writing',
            'System Architecture',
            'Networking',
            'Operating Systems',
            'Embedded Systems',
            'Robotics',
            'Quantum Computing',
        ];

        foreach ($skills as $skill) {
            DB::table('skills')->insert([
                'name' => $skill,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
