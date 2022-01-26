<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(8);
        return view('livewire.admin-users', compact('users'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }

    public function cambiarAdmin(User $user){
        if ($user->id !== 1){
            if(sizeof($user->roles)>0){
                $user->removeRole('Admin');
            }else{
                $user->assignRole('Admin');
            }
        }

    }

    public function removeUser(User $user){
        if ($user->id !== 1){
            //User::destroy($user->id);
        }

    }


}
