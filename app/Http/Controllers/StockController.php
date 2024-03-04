<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.stock.index', [
            'items' => Stock::all(),
            'category' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('item-photo', 'public');
        Stock::create($data);


        return  redirect()->back()->with('success', 'Kelas Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $data = $request->all();

        if(!empty($data['photo'])){
            $data['photo'] = $request->file('photo')->store('item-photo', 'public');
        }else{
            unset($data['photo']);
        }

        Stock::findOrFail($id)->update($data);

        return redirect()->back();
            
    }

    public function destroy($id){
        Stock::findOrFail($id)->delete();

        return redirect()->back();
    }
}
