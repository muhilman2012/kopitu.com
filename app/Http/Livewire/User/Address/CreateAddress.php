<?php

namespace App\Http\Livewire\User\Address;

use App\Models\User;
use App\Models\users_address;
use Livewire\Component;

class CreateAddress extends Component
{

    // for add address
    public $username, $label, $phone, $address, $districts, $postal_code;
    public $province_id, $city_id, $getprovince, $getcity;
    protected $rules = [
        'username' => 'required',
        'label' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'districts' => 'required',
        'province_id' => 'required',
        'city_id' => 'required',
        'postal_code' => 'required|integer',
    ];
    public function createdAddress()
    {
        $id = auth('user')->user()->id_users;
        $user = User::find($id);
        if ($user) {
            $this->validate();
            $save = users_address::create([
                'username' => $this->username,
                'label' => $this->label,
                'phone' => $this->phone,
                'address' => $this->address,
                'districts' => $this->districts,
                'postal_code' => $this->postal_code,
                'province_id' => $this->province_id,
                'city_id' => $this->city_id,
                'users_id' => $id
            ]);

            if ($save) {
                session()->flash('success', 'Data alamat berhasil ditambahkan!');
                $this->emit('addressModalExpand');
            } else {
                session()->flash('error', 'Maff data tidak dapat diproses ulangi nanti!');
                $this->emit('addressModalExpand');
            }
        } else {
            redirect()->route('login');
        }
    }

    

    public function render()
    {
        return view('livewire.user.address.create-address');
    }
}
