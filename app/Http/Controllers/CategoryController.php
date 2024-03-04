<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.category.index', [
            'items' => Category::all()
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
           Category::create($data);
           return  redirect()->back()->with('success', 'Kelas Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
           $data = $request->all();
           Category::findOrFail($id)->update($data);
           return  redirect()->back()->with('success', 'Kelas Berhasil Diedit');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
       
           Category::findOrFail($id)->delete();
           return  redirect()->back()->with('success', 'Kelas Berhasil Dihapus');
   }
}
