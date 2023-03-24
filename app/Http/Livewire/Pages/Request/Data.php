<?php

namespace App\Http\Livewire\Pages\Request;

use App\Models\rfq;
use Livewire\Component;
use Livewire\WithPagination;

class Data extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        if($this->search){
            $data = rfq::where('product_name', 'like', '%'. $this->search . '%')->orderBy('created_at', 'asc')->paginate(12);
        }else{
            $data = rfq::orderBy('created_at', 'asc')->paginate(12);
        }
        return view('livewire.pages.request.data', [
            'data' => $data
        ]);
    }
}
