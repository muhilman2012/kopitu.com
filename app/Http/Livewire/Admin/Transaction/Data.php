<?php

namespace App\Http\Livewire\Admin\Transaction;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Data extends Component
{
    use WithPagination;
    public function render()
    {
        $data = DB::table('view_users_transaction')->orderBy('date', 'asc')->paginate(20);
        return view('livewire.admin.transaction.data', [
            'data' => $data
        ]);
    }
}
