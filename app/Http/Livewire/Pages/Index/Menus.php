<?php

namespace App\Http\Livewire\Pages\Index;

use App\Models\category;
use Livewire\Component;

class Menus extends Component
{
    public function render()
    {
        $data = category::all();
        return view('livewire.pages.index.menus', [
            'data' => $data
        ]);
    }
}
