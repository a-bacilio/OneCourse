<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\OnlineVideo;
use App\Models\Resource;
use App\Models\Section;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::factory(1)->create();

        foreach($courses as $course){

            $sections  = Section::factory(4)->create(['course_id'=>$course->id]);

            foreach($sections as $section){
                $lessons = Lesson::factory(4)->create(['section_id'=>$section->id]);

                foreach($lessons as $lesson){
                    $resources = Resource::factory(3)->create(['lesson_id'=>$lesson->id]);
                    foreach($resources as $resource){

                        if ($resource->type == 'video'){
                            OnlineVideo::factory(1)->create(['resource_id'=>$resource->id]);
                        }elseif ($resource['type'] == 'image'){
                            Image::factory(1)->create(['resource_id'=>$resource->id]);
                        }
                    }
                }
            }



        }
    }
}
