<?php

namespace App\Http\Livewire\Admin\Brand;
 

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $name, $slug, $status, $brand_id;

    public function rules()
    {
        return[
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }
   

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
    }

    public function storeBrand()
    {
        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' =>$this->status == true ? '1':'0',
        ]);

        session()->flash('message','Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->restInput();
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function openModal()
    {
        $this->resetInput();
    }
    public function editBrand(int $brand_id)
    {
        $this->$brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;

    }
    public function deleteBrand($brand_id)
    {
        
        $this->brand_id= $brand_id;

    }
    public function updateBrand($brand_id)
    {
        
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' =>$this->status == true ? '1':'0',
        ]);

        session()->flash('message','Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->restInput();

    }

    public function destroyBrand()
    {

        $brand = Brand::find($this->brand_id);
        $brand->delete();
        session()->flash('message', 'Category Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $categories = Category::where('status','0')->get();
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands' => $brands, 'categories' => $categories])
                ->extends('layouts.admin')
                ->section('content');
    }

}
