<?php

namespace App\Http\Livewire\Pages\News;

use App\Models\news;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    
    use WithPagination;

    public function render()
    {
        $data = news::orderBy('created_at', 'asc')->paginate(12);
        return view('livewire.pages.news.index', [
            'data' => $data
        ]);
    }
}
