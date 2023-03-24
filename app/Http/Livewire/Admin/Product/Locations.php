<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\cities;
use App\Models\provinces;
use Livewire\Component;

class Locations extends Component
{
    public $getprovince = [];
    public $gecity = [];

    public $province_id, $city_id;

    public function mount($province_id, $city_id)
    {   
        if($province_id != null){
            $this->province_id = $province_id;
            $this->city_id = $city_id;
        }
    }

    public function render()
    {
        $this->getprovince = provinces::all();
        if ($this->province_id) {
            $this->getcity = cities::where('province_id', $this->province_id)->get();
        }

        return view('livewire.admin.product.locations');
    }
}
