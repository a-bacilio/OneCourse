<?php

namespace App\Http\Livewire;

use App\Models\Section;
use App\Models\Course;
use Livewire\Component;


class AdminEditCourse extends Component
{
    public $course_id;
    public function render()
    {
        $course = Course::find($this->course_id);
        $sections = Section::where('course_id',$this->course_id)->orderBy('updated_at','ASC')->get();
        $sections_nocourse = Section::where('course_id',null)->get();
        return view('livewire.admin-edit-course',compact(['course','sections','sections_nocourse']));
    }
    public function removesection($id){
        $section = section::find($id);
        $section->update(['course_id'=>null]);
    }
    public function addsection($id){
        $section = section::find($id);
        $section->update(['course_id'=>$this->course_id]);
    }
}
