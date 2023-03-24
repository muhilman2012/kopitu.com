<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\category_child;
use App\Models\category_sub;
use Livewire\Component;
use Illuminate\Support\Str;

class CategorySub extends Component
{

    public $data = [];
    public $childData = [];

    public $label;
    public $id_category_sub;
    public $id_categories;

    protected $listeners = [
        'deleteAction' => 'delete',
        'deleteChildAction' => 'deleteChildCtg'
    ];

    public function mount($post)
    {
        $this->id_categories = $post;
        $this->data = category_sub::where('id_categories', $post)->get();
        foreach ($this->data as $items) {
            $variable = category_child::where('id_categories_sub', $items->id_categories_sub)->get();
            $this->childData += [$items->id_categories_sub => $variable];
        }
    }

    public function resetInput()
    {
        $this->label = null;
    }

    // this sub categories function
    public function create()
    {
        $this->resetInput();
        $this->dispatchBrowserEvent('ctgModalShow');
    }
    public function store()
    {
        $this->validate(
            ['label' => 'required'],
            ['label.required' => 'Please input sub category'],
        );

        // lang this same form admins
        $lang = auth('admin')->user()->country;
        $slug = Str::slug($this->label);

        $ctg = new category_sub();
        $ctg->categories_sub = $this->label;
        $ctg->slug_sub = $slug;
        $ctg->region_sub = $lang;
        $ctg->id_categories = $this->id_categories;
        if ($ctg->save()) {
            session()->flash('success', 'Data telah ditambahkan');
        } else {
            session()->flash('error', 'Maff, data tidak dapat ditambahkan ulangi nanti');
        }
        $this->resetInput();
        $this->emit('isModals');
    }
    public function edit($id)
    {
        $this->id_category_sub = $id;
        $data = category_sub::find($id);
        $this->label = $data->categories_sub;
        $this->dispatchBrowserEvent('showEdit');
    }
    public function update()
    {
        $this->validate(
            ['label' => 'required'],
            ['label.required' => 'Please input sub category'],
        );

        $slug = Str::slug($this->label);
        $ctg = category_sub::find($this->id_category_sub);
        $ctg->categories_sub = $this->label;
        $ctg->slug_sub = $slug;
        if ($ctg->save()) {
            session()->flash('success', 'Data telah ditambahkan');
        } else {
            session()->flash('error', 'Maff, data tidak dapat ditambahkan ulangi nanti');
        }
    }
    public function prepareDelete($id)
    {
        $this->id_category_sub = $id;
        $this->dispatchBrowserEvent('deleteConfrim');
    }
    public function delete()
    {
        $dataToDelete = category_sub::find($this->id_category_sub);
        category_child::where('id_categories_sub', $dataToDelete->id_categories_sub)->delete();
        if ($dataToDelete->delete()) {
            session()->flash('success', 'Data telah berhasil dihapus!');
        } else {
            session()->flash('error', 'Oops data tidak ditemukan!');
        }
    }



    // this child categories function
    public $id_category_child;
    public function addChild($id)
    {
        $this->resetInput();
        $this->id_category_sub = $id;
        $this->dispatchBrowserEvent('childCateoryModal');
    }
    public function storeChildCtg(){
        $this->validate(
            ['label' => 'required'],
            ['label.required' => 'Please input sub category'],
        );

        $lang = auth('admin')->user()->country;
        $slug = Str::slug($this->label);

        $ctg = new category_child();
        $ctg->categories_child = $this->label;
        $ctg->slug_child = $slug;
        $ctg->region_child = $lang;
        $ctg->id_categories_sub = $this->id_category_sub;
        if ($ctg->save()) {
            session()->flash('success', 'Data telah ditambahkan');
        } else {
            session()->flash('error', 'Maff, data tidak dapat ditambahkan ulangi nanti');
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('childCategoryModalExpand');
    }
    public function deleteChild($id)
    {
        $this->id_category_child = $id;
        $this->dispatchBrowserEvent('deleteChildCtg');
    }
    public function deleteChildCtg()
    {
        $child = category_child::find($this->id_category_child);
        if ($child->delete()) {
            session()->flash('success', 'Data telah berhasil dihapus!');
        } else {
            session()->flash('error', 'Oops data tidak ditemukan!');
        }
    }

    public function render()
    {
        return view('livewire.admin.category.category-sub');
    }
}
