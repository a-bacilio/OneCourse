<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use App\Models\Section;
use Livewire\Component;

class AdminEditSection extends Component
{
    public $section_id;
    public function render()
    {
        $section = Section::find($this->section_id);
        $lessons = Lesson::where('section_id',$this->section_id)->orderBy('updated_at','ASC')->get();
        $lessons_nosection = Lesson::where('section_id',null)->get();
        return view('livewire.admin-edit-section',compact(['section','lessons','lessons_nosection']));
    }
    public function removelesson($id){
        $lesson = lesson::find($id);
        $lesson->update(['section_id'=>null]);
    }
    public function addlesson($id){
        $lesson = lesson::find($id);
        $lesson->update(['section_id'=>$this->section_id]);
    }
}
