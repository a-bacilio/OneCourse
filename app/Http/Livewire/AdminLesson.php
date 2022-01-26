<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithPagination;


class AdminLesson extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $lessons = Lesson::where('name', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(8);
        return view('livewire.admin-lesson', compact('lessons'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }
}
