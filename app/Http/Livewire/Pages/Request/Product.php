<?php

namespace App\Http\Livewire\Pages\Request;

use App\Models\category;
use App\Models\category_child;
use App\Models\category_sub;
use App\Models\rfq;
use App\Models\rfq_full;
use Livewire\Component;
use Livewire\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;

    public $ctgMain = [];
    public $ctgSub  = [];
    public $ctgChild = [];
    public $categories_id, $categories_sub_id, $categories_child_id;
    public $pillCtg, $pillCtgSub, $pillCtgChild;
    public $images1;
    public $images2;
    public $images3;
    public $images4;

    public $product_name, $categories, $qty, $unit, $description;
    public $exp, $min_price, $max_price, $type_price, $locations, $method_payment;


    protected $rules = [
        'product_name'     => 'required',
        'pillCtg'     => 'required',
        'qty'     => 'required',
        'unit'     => 'required',
        'description'     => 'required',
    ];

    protected $messages = [
        'product_name.required'     => 'Produk atau jasa belum diinputkan',
        'pillCtg.required'     => 'Categori belum dipilih',
        'qty.required'     => 'Jumlah permintaan belum diinputkan',
        'unit.required'     => 'Pilih jenis satuan produk',
        'description.required'     => 'deskripsi belum diinputkan',
    ];

    public function resetInput()
    {
        $this->categories_id = '';
        $this->categories_sub_id = '';
        $this->categories_child_id = '';
        $this->pillCtg = '';
        $this->pillCtgSub = '';
        $this->pillCtgChild = '';
        $this->images1 = '';
        $this->images2 = '';
        $this->images3 = '';
        $this->images4 = '';
        $this->product_name = '';
        $this->categories = '';
        $this->qty = '';
        $this->unit = '';
        $this->description = '';
        $this->exp = '';
        $this->min_price = '';
        $this->max_price = '';
        $this->type_price = '';
        $this->locations = '';
        $this->method_payment = '';
    }

    public function store()
    {
        $this->validate();
        
        $users_id = auth()->guard('user')->user()->id_users;
        $this->categories = $this->pillCtg . ',' . $this->pillCtgSub . ',' . $this->pillCtgChild;

        $rfq = new rfq();
        $rfq->product_name = $this->product_name;
        $rfq->categories = $this->categories;
        $rfq->qty = $this->qty;
        $rfq->units = $this->unit;
        $rfq->description = $this->description;
        $rfq->users_id = $users_id;
        if ($rfq->save()) {
            if ($this->exp or $this->min_price or $this->max_price or $this->type_price or $this->locations or $this->method_payment) {
                $file1 = '';
                $file2 = '';
                $file3 = '';
                $file4 = '';
                if ($this->images1) {
                    $resorce = $this->images1;
                    $originNamaImages = $resorce->getClientOriginalName();
                    $NewNameImages = "file-" . substr(md5($originNamaImages . date("YmdHis")), 0, 28);
                    $file1 = $NewNameImages . "." . $resorce->getClientOriginalExtension();
                    $resorce->storeAs('/images/rfq/',  $file1, 'myLocal');
                }
                if ($this->images2) {
                    $resorce = $this->images2;
                    $originNamaImages = $resorce->getClientOriginalName();
                    $NewNameImages = "file-" . substr(md5($originNamaImages . date("YmdHis")), 0, 28);
                    $file2 = $NewNameImages . "." . $resorce->getClientOriginalExtension();
                    $resorce->storeAs('/images/rfq/',  $file2, 'myLocal');
                }
                if ($this->images3) {
                    $resorce = $this->images3;
                    $originNamaImages = $resorce->getClientOriginalName();
                    $NewNameImages = "file-" . substr(md5($originNamaImages . date("YmdHis")), 0, 28);
                    $file3 = $NewNameImages . "." . $resorce->getClientOriginalExtension();
                    $resorce->storeAs('/images/rfq/',  $file3, 'myLocal');
                }
                if ($this->images4) {
                    $resorce = $this->images4;
                    $originNamaImages = $resorce->getClientOriginalName();
                    $NewNameImages = "file-" . substr(md5($originNamaImages . date("YmdHis")), 0, 28);
                    $file4 = $NewNameImages . "." . $resorce->getClientOriginalExtension();
                    $resorce->storeAs('/images/rfq/',  $file4, 'myLocal');
                }

                rfq_full::create([
                    'exp' => $this->exp,
                    'min_price' => $this->min_price,
                    'max_price' => $this->max_price,
                    'type_price' => $this->type_price,
                    'location' => $this->locations,
                    'file1' => $file1,
                    'file2' => $file2,
                    'file3' => $file3,
                    'file4' => $file4,
                    'method_payment' => $this->method_payment,
                    'rfq_id' => $rfq->id_rfq,
                ]);
            }

            $this->resetInput();
            session()->flash('success', 'Permintaanmu telah direkam dan dalam pengecekan');
        } else {
            $this->resetInput();
            session()->flash('error', 'sorry something worng white database, try again later.');
        }
    }

    public function deleteFile($x)
    {
        // dd($x);
        if ($x == 1) {
            $this->images1 = null;
        } elseif ($x == 2) {
            $this->images2 = null;
        } elseif ($x == 3) {
            $this->images3 = null;
        } elseif ($x == 4) {
            $this->images4 = null;
        }
    }

    public function render()
    {
        $this->ctgMain = category::all();
        if ($this->categories_id) {
            $ctgMain = category::find($this->categories_id);
            $this->pillCtg = $ctgMain->categories;
            $this->ctgSub = category_sub::where('id_categories', $this->categories_id)->get();
        }
        if ($this->categories_sub_id) {
            $ctgSub = category_sub::find($this->categories_sub_id);
            $this->pillCtgSub = $ctgSub->categories_sub;
            $this->ctgChild = category_child::where('id_categories_sub', $this->categories_sub_id)->get();
        }
        if ($this->categories_child_id) {
            $ctgChild = category_child::find($this->categories_child_id);
            $this->pillCtgChild = $ctgChild->categories_child;
        }
        return view('livewire.pages.request.product');
    }
}
