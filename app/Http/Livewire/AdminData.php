<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class AdminData extends Component
{
    use WithPagination ;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id','DESC')
            ->paginate(8);
        return view('livewire.admin-userdata',compact('users'));
    }
}
