<?php

namespace App\Http\Livewire\Pages\Request;

use App\Models\rfq_full;
use Livewire\Component;

class Images extends Component
{
    public $post;
    public function mount($post)
    {
        // dd($post);
        $this->post = $post;
    }
    public function render()
    {
        $data = rfq_full::where('rfq_id', $this->post)->first();
        return view('livewire.pages.request.images', ['img' => $data]);
    }
}
