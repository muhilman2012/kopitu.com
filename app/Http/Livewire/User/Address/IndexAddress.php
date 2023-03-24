<?php

namespace App\Http\Livewire\User\Address;

use App\Models\cities;
use App\Models\provinces;
use App\Models\User;
use App\Models\users_address;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IndexAddress extends Component
{
    public $address_id;
    public $edit_id;

    public $editMode = false;

    protected $listeners = ['deleteAction' => 'delete'];

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

    public function show()
    {
        $this->username = '';
        $this->label = '';
        $this->phone = '';
        $this->address = '';
        $this->districts = '';
        $this->postal_code = '';
        $this->users_id = '';
        $this->province_id = '';
        $this->city_id = '';
        $this->editMode = false;

        $this->dispatchBrowserEvent('addressModalShow');
    }

    public function store()
    {
        $id = auth('user')->user()->id_users;
        $user = User::find($id);
        if ($user) {
            $address = users_address::where('users_id', $id)->get();
            $this->validate();
            if($address->count() == 0){
                $save = users_address::create([
                    'username' => $this->username,
                    'label' => $this->label,
                    'phone' => $this->phone,
                    'address' => $this->address,
                    'districts' => $this->districts,
                    'postal_code' => $this->postal_code,
                    'province_id' => $this->province_id,
                    'city_id' => $this->city_id,
                    'users_id' => $id,
                    'active' => 1
                ]);
            }else{
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
            }

            if ($save) {
                session()->flash('success', 'Data alamat berhasil ditambahkan!');
            } else {
                session()->flash('error', 'Maff data tidak dapat diproses ulangi nanti!');
            }
            $this->dispatchBrowserEvent('addressModalExpand');
        } else {
            redirect()->route('login');
        }
    }

    public function edit($id)
    {
        $this->edit_id = $id;

        $data = users_address::find($id);
        $this->username = $data->username;
        $this->label = $data->label;
        $this->phone = $data->phone;
        $this->address = $data->address;
        $this->districts = $data->districts;
        $this->postal_code = $data->postal_code;
        $this->users_id = $data->users_id;
        $this->province_id = $data->province_id;
        $this->city_id = $data->city_id;
        $this->editMode = true;

        $this->dispatchBrowserEvent('addressModalShow');
    }

    public function update()
    {
        $this->validate();

        $users_id = auth('user')->user()->id_users;
        $addressed = users_address::find($this->edit_id);
        $addressed->username = $this->username;
        $addressed->label = $this->label;
        $addressed->phone = $this->phone;
        $addressed->address = $this->address;
        $addressed->districts = $this->districts;
        $addressed->postal_code = $this->postal_code;
        $addressed->province_id = $this->province_id;
        $addressed->city_id = $this->city_id;
        $addressed->users_id = $users_id;

        if ($addressed->save()) {
            session()->flash('success', 'Data alamat berhasil ditambahkan!');
        } else {
            session()->flash('error', 'Maff data tidak dapat diproses ulangi nanti!');
        }
        $this->editMode = false;
        $this->dispatchBrowserEvent('addressModalExpand');
    }

    public function deleteAddress($id)
    {
        $this->address_id = $id;

        $this->dispatchBrowserEvent('deleteConfrimed');
    }

    public function delete()
    {
        $toDelete = users_address::find($this->address_id);
        if ($toDelete->delete()) {
            session()->flash('success', 'Alamat kamu telah terhapus');
        } else {
            session()->flash('error', 'Alamat tidak ditemukan!');
        }
    }

    public function setAddres($id)
    {
        try {
            $address = users_address::where('active', 1)->first();
            if($address){
                $address->active = 0;
                $address->save();
            }
            $data = users_address::find($id);
            $data->active = 1;
            $data->save();
            session()->flash('success', 'Alamat berhasil dipilih');
        } catch (\Throwable $th) {
            session()->flash('error', 'Maaf sistem sedang sibuk, ulangi nanti.');
        }
    }

    public function render()
    {
        // for add address
        $this->getprovince = provinces::all();
        if ($this->province_id) {
            $this->getcity = cities::where('province_id', $this->province_id)->get();
        }

        $users_id = auth('user')->user()->id_users;
        $datas = DB::table('view_users_address')->where('users_id', $users_id)->orderBy('id_address', 'asc')->get();
        return view('livewire.user.address.index-address', [
            'dataAddress' => $datas
        ]);
    }
}
