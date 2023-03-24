<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\category;
use App\Models\category_sub;
use App\Models\productCategory;
use App\Models\productCategorySub;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class IndexCategory extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $label, $images;
    public $id_category;
    public $id_category_sub;

    public $subdata = [];

    protected $listeners = [
        'deleteAction' => 'delete',
        'deleteSubAction' => 'deleteSubCtg'
    ];

    protected $rules = [
        'label'     => 'required',
        'images'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
    ];

    protected $messages = [
        'label.required' => 'please input the category label!',
        'images.required' => 'Category must input images!',
        'images.image' => 'Oops sepertinya yang diupload bukan gambar!',
        'images.mimes' => 'Format gambar harus jpeg, png, jpg atau svg!',
        'images.max' => 'Ukuran gambar maksimal 4mb!',
    ];

    
    public function create()
    {
        $this->resetInput();
        $this->dispatchBrowserEvent('ctgModalShow');
    }
    public function store()
    {
        $this->validate();

        $resorce = $this->images;
        $originNamaImages = $resorce->getClientOriginalName();
        $NewNameImages = "ICO-" . substr(md5($originNamaImages . date("YmdHis")), 0, 28);
        $iconsName = $NewNameImages . "." . $resorce->getClientOriginalExtension();

        // lang this same form admins
        $lang = auth('admin')->user()->country;
        $slug = Str::slug($this->label);

        $ctg = new category();
        $ctg->categories = $this->label;
        $ctg->slug = $slug;
        $ctg->icons = $iconsName;
        $ctg->region = $lang;
        if ($ctg->save()) {
            $resorce->storeAs('/images/product/category/',  $iconsName, 'myLocal');
            // $resorce->move(public_path() . "/images/icons/design/" . $iconsName);
            session()->flash('success', 'Data telah ditambahkan');
        } else {
            session()->flash('error', 'Maff, data tidak dapat ditambahkan ulangi nanti');
        }
        $this->resetInput();
        $this->emit('isModals');
    }
    public function edit($id)
    {
        $this->id_category = $id;
        $data = category::find($id);
        $this->label = $data->categories;
        $this->images = '';
        $this->dispatchBrowserEvent('showEdit');
    }
    public function update()
    {
        if ($this->images) {
            $this->validate();
            $resorce = $this->images;
            $originNamaImages = $resorce->getClientOriginalName();
            $NewNameImages = "ICO-" . substr(md5($originNamaImages . date("YmdHis")), 0, 28);
            $iconsName = $NewNameImages . "." . $resorce->getClientOriginalExtension();
            $slug = Str::slug($this->label);
            $ctg = category::find($this->id_category);
            $ctg->categories = $this->label;
            $ctg->slug = $slug;
            $ctg->icons = $iconsName;
            if ($ctg->save()) {
                $resorce->storeAs('/images/product/category/',  $iconsName, 'myLocal');
                session()->flash('success', 'Data telah ditambahkan');
            } else {
                session()->flash('error', 'Maff, data tidak dapat ditambahkan ulangi nanti');
            }
        } else {
            $slug = Str::slug($this->label);
            $ctg = category::find($this->id_category);
            $ctg->categories = $this->label;
            $ctg->slug = $slug;
            if ($ctg->save()) {
                session()->flash('success', 'Data telah ditambahkan');
            } else {
                session()->flash('error', 'Maff, data tidak dapat ditambahkan ulangi nanti');
            }
        }
    }
    public function prepareDelete($id)
    {
        $this->id_category = $id;
        $this->dispatchBrowserEvent('deleteConfrim');
    }
    public function delete()
    {
        $dataToDelete = category::find($this->id_category);
        if ($dataToDelete->delete()) {
            session()->flash('success', 'Data telah berhasil dihapus!');
        } else {
            session()->flash('error', 'Oops data tidak ditemukan!');
        }
    }


    public function addSub($id)
    {
        $this->resetInput();
        $this->id_category_sub = $id;
        $this->dispatchBrowserEvent('subCateoryModal');
    }
    public function storeSubCtg(){
        $this->validate(
            ['label' => 'required'],
            ['label.required' => 'Please input sub category'],
        );

        $lang = auth('admin')->user()->country;
        $slug = Str::slug($this->label);

        $ctg = new category_sub();
        $ctg->categories_sub = $this->label;
        $ctg->slug_sub = $slug;
        $ctg->region_sub = $lang;
        $ctg->id_categories = $this->id_category_sub;
        if ($ctg->save()) {
            session()->flash('success', 'Data telah ditambahkan');
        } else {
            session()->flash('error', 'Maff, data tidak dapat ditambahkan ulangi nanti');
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('SubCategoryModalExpand');
    }
    public function deleteSub($id)
    {
        $this->id_category_sub = $id;
        $this->dispatchBrowserEvent('deleteSubCtg');
    }
    public function deleteSubCtg()
    {
        $subs = category_sub::find($this->id_category_sub);
        if ($subs->delete()) {
            session()->flash('success', 'Data telah berhasil dihapus!');
        } else {
            session()->flash('error', 'Oops data tidak ditemukan!');
        }
    }


    public function resetInput()
    {
        $this->label = null;
        $this->images = null;
    }
    public function render()
    {
        $lang = auth('admin')->user()->country;
        $data = category::where('region', $lang)->paginate(12);

        foreach ($data as $items) {
            $variable = category_sub::where('id_categories', $items->id_categories)->get();
            $this->subdata += [$items->id_categories => $variable];
        }

        return view('livewire.admin.category.index-category', [
            'data' => $data
        ]);
    }
}
