<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Credit;


class AdminCredit extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $credits = Credit::where('name', 'LIKE', '%' . $this->search . '%')
            ->orderBy('order','ASC')
            ->paginate(8);
        return view('livewire.admin-credit',compact('credits'));
    }


    public function removeCredit($id){
        $order = Credit::find($id)->order;
        $credits = Credit::all();
        foreach($credits as $credit){
            if($credit->order>$order){
                $credit->update(['order'=>$credit->order-1]);
            }
        }
        Credit::destroy($id);
    }

    public function moveCreditUp($id){
        $credit = Credit::find($id);
        if($credit->order>1){
            $credit_x = Credit::where('order','=',$credit->order-1)->firstOrFail();;
            $credit->update(['order'=>$credit->order-1]);
            $credit_x->update(['order'=>$credit_x->order+1]);
        }
    }

    public function moveCreditDown($id){
        $credit = Credit::find($id);
        $credits = Credit::all();
        if($credit->order<sizeof($credits)){
            $credit_x = Credit::where('order','=',$credit->order+1)->firstOrFail();;
            $credit->update(['order'=>$credit->order+1]);
            $credit_x->update(['order'=>$credit_x->order-1]);
        }
    }
}
