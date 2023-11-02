<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $sellTransactions = TransactionDetail::with(['transaction.user','product.galleries'])
            ->whereHas('product', function($product){
                $product->where('users_id', Auth::user()->id);
            })
            ->orderBy('created_at', 'desc')
            ->get();
        
        $buyTransactions = TransactionDetail::with(['transaction.user','product.galleries'])
            ->whereHas('transaction', function($transaction){
                $transaction->where('users_id', Auth::user()->id);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.dashboard-transactions',[
            'sellTransactions' => $sellTransactions,
            'buyTransactions' => $buyTransactions
        ]);
    }
    
    public function detailsSell(Request $request, $id)
    {   
        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
            ->findOrFail($id);
        return view('pages.dashboard-transactions-details-sell',[
            'transaction' => $transaction
        ]);
    }
    
    public function detailsBuy(Request $request, $id)
    {   
        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
            ->findOrFail($id);
        return view('pages.dashboard-transactions-details-buy',[
            'transaction' => $transaction
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionDetail::findOrFail($id);

        $item->update($data);

        return redirect()->route('dashboard-transaction', $id);
    }
}
