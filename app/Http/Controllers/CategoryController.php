<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

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

        $products = Product::with(['galleries','review','user'])->filter(request(['search','category']))->latest()->paginate(8)->withQueryString();


       /*  $totalSumOfRates = 0;

        foreach ($products as $product) {
            $totalSumOfRates = $product->review->pluck('rate')->flatten()->sum();
            $countSumOfRates = $product->review->pluck('rate')->flatten()->count();
            $result = $totalSumOfRates / $countSumOfRates;
            dd($result);
        } */

        /* dd($totalSumOfRates); */

        
        
/* $totalSumOfRates = $products->pluck('review.*.rate')->flatten()->sum();

dd($totalSumOfRates); */

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

