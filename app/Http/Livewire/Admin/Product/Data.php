<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\product;
use App\Models\productImages;
use Livewire\Component;
use Livewire\WithPagination;

class Data extends Component
{
    use WithPagination; 

    public $search = '';
    public $product_id;

    public $shortName = false;

    protected $listeners = ["deleteAction" => "delete"];

    public function removed($id){
        $this->product_id = $id;

        $this->dispatchBrowserEvent('deleteConfrimed');
    }

    public function delete()
    {
        $data = product::where('id_product', $this->product_id)->first();
        // dd($data);
        if (!$data) {
            return session()->flash('error', 'Sepertinya data sudah terhapus!');
        } else {
            // // unlink(public_path() . '/images/product/' . $data->images);
            
            // $fotoproduk = productImages::where('id_product', $this->product_id)->get();
            // foreach ($fotoproduk as $img) {
            //     // unlink(public_path() . '/images/product/multiple/' . $img->locations);
            // }

            product::where('id_product', $this->product_id)->delete();
            productImages::where('id_product', $this->product_id)->delete();
            return session()->flash('success', 'Data telah berhasil dihapus!');
        }
    }

    public function productName(){
        if($this->shortName == true){
            $this->shortName = false;
        }else{
            $this->shortName = true;
        }
    }

    public function render()
    {
        if($this->shortName == true){
            $product = product::where('product_name', 'like', '%' . $this->search . '%')->orderBy('product_name', 'desc')->paginate(12);
        }else{
            $product = product::where('product_name', 'like', '%' . $this->search . '%')->orderBy('product_name', 'asc')->paginate(12);
        }
        return view('livewire.admin.product.data', [
            'data' => $product
        ]);
    }
}
