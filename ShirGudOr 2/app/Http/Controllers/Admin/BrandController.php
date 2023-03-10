<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Requests\BrandFormRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }
    public function create()
    {
        return view('admin.brand.create');
    }
    public function store(BrandFormRequest $request )
    {
        $validateData = $request->validated();
        $brand = new Brand;
        $brand->name = $validateData['name'];
        $brand->slug = Str::slug($validateData['slug']);
        $brand->status = $request->status ==true ? '1':'0';
        $brand->save();
        return redirect('admin/brand')->with('message', 'Brand Added Successfully');
    }

    public function edit($brand_id)
    {
        $brand = Brand::find($brand_id);
        return view('admin/brand/edit', compact('brand'));
    }
    public function update(BrandFormRequest $request, $brand_id)
    {
            $data = $request->validated();

            $brand =Brand::where('id', $brand_id)->update([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'status' => $request->status ==true ? '1':'0'


            ]);
          
           return redirect('admin/brand')->with('message', 'Brand Updated Successfully');
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
