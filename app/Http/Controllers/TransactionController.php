<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.transaction.index', [
            'stocks' => Stock::all(),
            'categories' => Category::all(),
            'data' => Transaction::all(),
            

        ]);
    }

   
   
    public function store(Request $request)
    {
        $data = $request->all();
        $stock = Stock::findOrFail($request->stock_id);

        if ($request->quantity > $stock->quantity){
            return back()->with('error', 'Stock tidak cukup, stok sekarang adalah: ' . $stock->quantity);
        }
// UNTUK MENGUPDATE STOCK PRODUCT
        $update_stock['quantity'] = $stock->quantity - $request->quantity;
        $stock->update($update_stock);

        Transaction::create($data);
        return redirect()->back();
    
    }

       /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        Transaction::findOrFail($id)->delete();

        return redirect()->back();
    }
}
