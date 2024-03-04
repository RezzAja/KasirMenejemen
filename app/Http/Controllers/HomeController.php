<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

            $jumlah_stok = Stock::count();        
            $jumlah_barang = Stock::all();        
            $jumlah_pengeluran = Transaction::all();        
           
    
            return view('dashboard', [
                'jumlah_stok' => $jumlah_stok,
                'jumlah_barang' => $jumlah_barang->sum('quantity'),
                'jumlah_pengeluaran' => $jumlah_pengeluran->sum('quantity'),
                'hasil' => $jumlah_pengeluran->sum('quantity') * 23400,
                
            ]);
        
    }
}
