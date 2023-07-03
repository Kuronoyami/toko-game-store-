<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $title = 'All Items';
        if (request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = 'Item in ' . $category->name;
        }

        $categories = Category::all();
        $products = Product::with(['galleries'])->filter(request(['search','category']))->latest()->paginate(8)->withQueryString();
        return view('pages.category',[
            'categories' => $categories,
            'products' => $products,
            'title' => $title
        ]);
    }
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::with(['galleries'])->where('categories_id', $category->id)->latest()->paginate(8);
        return view('pages.category',[
            'categories' => $categories,
            'products' => $products
        ]);
    }
}

