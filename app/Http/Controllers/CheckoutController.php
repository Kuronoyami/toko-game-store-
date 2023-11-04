<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TransactionCreated;

use Illuminate\Support\Facades\Notification;


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

            $sellerIds[] = $cart->product->users_id;
        }
        

        $detailToSeller = [
            'greeting' => 'Terdapat Transaksi Cuy',
            'body' => 'Ini pembayaranmu',
            'actiontext' => 'Ini Isinya',
            'actionurl' => '/',
            'lastline' => 'Footer'
        ];
        
        $detailToBuyyer = [
            'greeting' => 'Transaksimu Sukses Cuy',
            'body' => 'Ini pembayaranmu',
            'actiontext' => 'Ini Isinya',
            'actionurl' => '/',
            'lastline' => 'Footer'
        ];

        // Send Email to Multi Seller
        foreach ($sellerIds as $sellerId) {
            $seller = User::find($sellerId);
            /* $sellers[] = $seller; */
            Notification::route('mail', [
                $seller->email => $seller->name,
            ])->notify(new TransactionCreated($detailToSeller));
            /* Notification::send($seller, new TransactionCreated($details)); */
        }

        // Send Mail to Buyyer
        Notification::route('mail', [
                Auth::user()->email => Auth::user()->name,
            ])->notify(new TransactionCreated($detailToBuyyer));

        /* dd('Done!'); */

        /* dd($sellers); */

        /* dd('Terkirim!'); */

        // Delete Cart Data
        Cart::where('users_id', Auth::user()->id)->delete();

        return view('pages.success');
        

    }
    
    /* public function callback(Request $request){

    } */
}
