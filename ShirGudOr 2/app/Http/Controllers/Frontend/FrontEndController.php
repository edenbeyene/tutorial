<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();

        return view('frontend.index', compact('sliders'));
    }

    public function categories()
    {
        $categories = Category::where('status','0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        if ($category){
            $products = $category->products()->get();
            return view('frontend.collections.products.index', compact('products'));


        } else {
            return redirect()->back();
        }
    }
    public function brands()
    {
        $categories = Category::where('status','0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }
    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        if ($category){
                        $products = $category->products()->where('slug', $product_slug)->where('status','0')->first();
                        if($product)
                        {
                            return view('frontend.collections.products.index', compact('product','category'));
                        
                        }
                        else    {
                                   return redirect()->back();
                                 } 

                                }else     {
                                     return redirect()->back();
                                }
   
                            }

    }
     
   

