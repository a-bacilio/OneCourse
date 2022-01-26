<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Section;
use Livewire\WithPagination;

class AdminSection extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $sections = Section::where('name', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(8);
        return view('livewire.admin-section', compact('sections'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }
}
