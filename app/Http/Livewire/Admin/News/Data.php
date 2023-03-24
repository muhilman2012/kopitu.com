<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\news;
use Livewire\Component;
use Livewire\WithPagination;

class Data extends Component
{
    use WithPagination;
    public $id_news;

    protected $listeners = ["deleteAction" => "delete"];

    public function removed($id){
        $this->id_news = $id;
        $this->dispatchBrowserEvent('deleteConfrimed');
    }

    public function delete()
    {
        $data = news::find($this->id_news);
        if ($data) {
            $data->delete();
            return session()->flash('success', 'Data has been delete!');
        } else {
            return session()->flash('error', 'sorry something problem in database!');
        }
    }

    public function render()
    {
        $data = news::orderBy('created_at', 'asc')->paginate(12);
        return view('livewire.admin.news.data', [
            'data' => $data
        ]);
    }
}
