<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\users_address;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $address = [];

    public $username, $born, $gender, $email, $phone, $images;
    public function edit()
    {
        $this->username = auth('user')->user()->username;
        $this->born = auth('user')->user()->born;
        $this->gender = auth('user')->user()->gender;
        $this->dispatchBrowserEvent('showModals');
    }

    public function editContact()
    {
        $this->email = auth('user')->user()->email;
        $this->phone = auth('user')->user()->phone;
        $this->dispatchBrowserEvent('showContactModals');
    }

    public function store()
    {
        $this->validate(
            ['username' => 'required'],
            ['username.required' => 'Username anda tidak boleh kosong',]
        );

        $data = User::find(auth('user')->user()->id_users);
        $data->username = $this->username;
        $data->born     = $this->born;
        $data->gender   = $this->gender;
        if ($data->save()) {
            session()->flash('success', 'Data profile anda telah diperbarui');
        } else {
            session()->flash('error', 'Data tidak dapat diperbarui saat ini, ulangi nanti');
        }
        $this->dispatchBrowserEvent('expandModals');
    }

    public function storeContact()
    {
        $this->validate(
            ['phone' => 'required|numeric'],
            [
                'phone.required' => 'nomor telepon anda masih kosong',
                'phone.numeric' => 'nomor telepon salah',
                // 'phone.min' => 'Oops nomor telepon anda kurang',
                // 'phone.max' => 'Oops nomor telepon anda telalu panjang',
            ]
        );

        $number_phone = 62 . $this->phone;
        $data = User::find(auth('user')->user()->id_users);
        $data->phone = $number_phone;
        if ($data->save()) {
            session()->flash('success', 'Data profile anda telah diperbarui');
        } else {
            session()->flash('error', 'Data tidak dapat diperbarui saat ini, ulangi nanti');
        }
        $this->dispatchBrowserEvent('expandModals');
    }

    public function showImagesModals(){
        $this->images = '';
        $this->dispatchBrowserEvent('imagesModalsShow');
    }

    public function storeImages()
    {
        $this->validate([
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 1MB Max
        ],[
            'images.image'          => 'Oops, file yang kamu upload bukan images',
            'images.mimes'          => 'Oops, format file tidak mendukung',
            'images.max'            => 'Oops, file images terlalu besar',
        ]);

        $id_users = auth('user')->user()->id_users;
        // images 
        $resorce = $this->images;
        $originNama = $resorce->getClientOriginalName();
        $NewNameImage = "IMG-" . substr(md5($originNama . date("YmdHis")), 0, 14);
        $imagesName = $NewNameImage . "." . $resorce->getClientOriginalExtension();
        // find user and update images
        $data = User::find($id_users);
        $data->avatar = $imagesName;
        if($data->save()){
            $resorce->storeAs('/images/avatar/user' ,  $imagesName, 'myLocal');
            session()->flash('success', 'foto profile kamu telah berhasi dirubah');
        }else{
            session()->flash('error', 'foto profile kamu gagal dirubah, ulangi nanti!');
        }
        $this->dispatchBrowserEvent('imagesModalsExpand');
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
