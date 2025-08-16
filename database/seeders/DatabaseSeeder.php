<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Course;
use App\Models\Professor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Only create test user if it doesn't exist
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]); 
        }
        
        Student::factory(20)->create();
        Professor::factory(10)->create();
        Course::factory(10)->create();
        
        // Assign random professors to courses
        $professors = Professor::all();
        $courses = Course::all();
        
        foreach($courses as $course) {
            // 70% chance to assign a professor
            if(rand(1, 10) <= 7) {
                $course->professor_id = $professors->random()->id;
                $course->save();
            }
        }
        
        // Attach students to courses (many-to-many)
        $students = Student::all();
        foreach($courses as $course) {
            // Attach 3-8 random students to each course
            $course->students()->attach(
                $students->random(rand(3, 8))->pluck('id')->toArray()
            );
        }
        
        // Attach random courses to students (many-to-many relationship)
        $students = Student::all();
        $courses = Course::all();
        
        foreach ($students as $student) {
            $student->courses()->attach($courses->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
