<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DetailController extends Controller
{
       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {   
        $product = Product::with(['galleries','user','category'])->where('slug', $id)->firstOrFail();

        $reviews = Review::with(['user', 'product'])
        ->where('products_id', $product->id)
        ->orderBy('created_at', 'desc')
        ->get();
        $reviewCount = $reviews->count();

        $rateSum = Review::with(['user', 'product'])
        ->where('products_id', $product->id)
        ->get()
        ->sum('rate');
        
        $totalRateSum = Review::with(['user', 'product'])
        ->where('products_id', $product->id)
        ->count();

       /*  dd($totalRateSum); */
        
        if ($rateSum !== null && $rateSum !== 0) {
            $rate = number_format($rateSum / $totalRateSum, 1);
        } else {
            $rate = number_format(0, 1);
        }

        /* foreach ($reviews as $review) {
            $rateSum += $review->rate;
        } */

        /* dd($rate); */

        return view('pages.detail',[
            'product' => $product,
            'reviews' => $reviews,
            'reviewCount' => $reviewCount,
            'rate' => $rate
        ]);
    }

    public function add(Request $request, $id){
        $data = [
            'products_id' => $id,
            'users_id' =>Auth::user()->id,
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }
}
