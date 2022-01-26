<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Resource;
use App\Models\Lesson;

class AdminEditLesson extends Component
{
    public $lesson_id;
    public function render()
    {
        $lesson = Lesson::find($this->lesson_id);
        $resources = Resource::where('lesson_id',$this->lesson_id)->orderBy('updated_at','ASC')->get();
        $resources_nolesson = Resource::where('lesson_id',null)->get();
        return view('livewire.admin-edit-lesson',compact(['lesson','resources','resources_nolesson']));
    }
    public function removeResource($id){
        $resource = Resource::find($id);
        $resource->update(['lesson_id'=>null]);
    }
    public function addResource($id){
        $resource = Resource::find($id);
        $resource->update(['lesson_id'=>$this->lesson_id]);
    }
}
