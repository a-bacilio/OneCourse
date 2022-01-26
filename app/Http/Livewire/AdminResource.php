<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Resource;
use Livewire\WithPagination;

class AdminResource extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $resources = Resource::where('name', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(4);
        return view('livewire.admin-resource', compact('resources'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }

}
