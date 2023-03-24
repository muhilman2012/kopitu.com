<?php

namespace App\Http\Livewire\Pages\Request;

use App\Models\rfq;
use Livewire\Component;

class RfqProduct extends Component
{
    public function render()
    {
        $data = rfq::orderBy('created_at', 'asc')->paginate(12);
        return view('livewire.pages.request.rfq-product', [
            'data' => $data
        ]);
    }
}
