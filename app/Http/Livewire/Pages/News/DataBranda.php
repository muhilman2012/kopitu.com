<?php

namespace App\Http\Livewire\Pages\News;

use App\Models\news;
use Livewire\Component;

class DataBranda extends Component
{
    public function render()
    {
        $data = news::orderBy('created_at', 'desc')->limit(4)->get();
        return view('livewire.pages.news.data-branda', [
            'data' => $data
        ]);
    }
}
