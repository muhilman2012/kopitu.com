<?php

namespace App\Http\Livewire\Pages\Request;

use App\Models\rfq as ModelsRfq;
use Livewire\Component;
use Livewire\WithPagination;

class Rfq extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $data = ModelsRfq::orderBy('created_at', 'asc')->paginate(12);
        return view('livewire.pages.request.rfq', [
            'data' => $data
        ]);
    }
}
