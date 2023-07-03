<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;


class CheckoutController extends Controller
{
    public function process(Request $request){
        // Save User Data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Proses Checkout
        $code = 'GMK-' .  mt_rand(000000,999999);
        $carts =  Cart::with(['product','user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();
        
        // Transaction Create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'tax_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        // Foreach Transaction Detail
        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(000000,999999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'delivery_status' => 'PENDING',
                'nomor_pemesanan' => '',
                'code' => $trx,
                'catatan'=> Auth::user()->catatan_beli,
                'metode_bayar'=> Auth::user()->metode_pembayaran
            ]);
        }

        // Delete Cart Data
        Cart::where('users_id', Auth::user()->id)->delete();

        return view('pages.success');
        

    }
    
    /* public function callback(Request $request){

    } */
}
