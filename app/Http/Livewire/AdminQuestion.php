<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Question;

class AdminQuestion extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $questions = Question::where('question', 'LIKE', '%' . $this->search . '%')
            ->orderBy('order','ASC')
            ->paginate(8);
        return view('livewire.admin-question',compact('questions'));
    }

    public function removeQuestion($id){
        $order = Question::find($id)->order;
        $questions = Question::all();
        foreach($questions as $question){
            if($question->order>$order){
                $question->update(['order'=>$question->order-1]);
            }
        }
        Question::destroy($id);
    }

    public function moveQuestionUp($id){
        $question = Question::find($id);
        if($question->order>1){
            $question_x = Question::where('order','=',$question->order-1)->firstOrFail();;
            $question->update(['order'=>$question->order-1]);
            $question_x->update(['order'=>$question_x->order+1]);
        }
    }

    public function moveQuestionDown($id){
        $question = Question::find($id);
        $questions = Question::all();
        if($question->order<sizeof($questions)){
            $question_x = Question::where('order','=',$question->order+1)->firstOrFail();;
            $question->update(['order'=>$question->order+1]);
            $question_x->update(['order'=>$question_x->order-1]);
        }
    }
}
