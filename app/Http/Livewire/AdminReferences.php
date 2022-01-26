<?php

namespace App\Http\Livewire;

use App\Models\Reference;
use Livewire\Component;
use Livewire\WithPagination;

class AdminReferences extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $references = Reference::where('value', 'LIKE', '%' . $this->search . '%')
            ->orderBy('order','ASC')
            ->paginate(8);
        return view('livewire.admin-references',compact('references'));
    }


    public function removeReference($id){
        $order = Reference::find($id)->order;
        $references = Reference::all();
        foreach($references as $reference){
            if($reference->order>$order){
                $reference->update(['order'=>$reference->order-1]);
            }
        }
        Reference::destroy($id);
    }

    public function moveReferenceUp($id){
        $reference = Reference::find($id);
        if($reference->order>1){
            $reference_x = Reference::where('order','=',$reference->order-1)->firstOrFail();;
            $reference->update(['order'=>$reference->order-1]);
            $reference_x->update(['order'=>$reference_x->order+1]);
        }
    }

    public function moveReferenceDown($id){
        $reference = Reference::find($id);
        $references = Reference::all();
        if($reference->order<sizeof($references)){
            $reference_x = Reference::where('order','=',$reference->order+1)->firstOrFail();;
            $reference->update(['order'=>$reference->order+1]);
            $reference_x->update(['order'=>$reference_x->order-1]);
        }
    }

}
