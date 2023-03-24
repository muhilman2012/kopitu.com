<?php

namespace App\Http\Livewire\Pages\Layouts;

use App\Models\category;
use App\Models\productCategory;
use Livewire\Component;

class NavSecondary extends Component
{
    public function render()
    {
        $ctg = category::all();
        return view('livewire.pages.layouts.nav-secondary', [
            'ctg' => $ctg
        ]);
    }
}
