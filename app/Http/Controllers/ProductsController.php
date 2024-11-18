<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $products=Products::paginate(10);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
        Products::create($request->all());
        return redirect()->back()->with('success', 'Product added successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to add product. Please try again.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        // dd($product->toArray());
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Products $product)
    {
         try {
        $product->update($request->all());
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to add product. Please try again.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
{
    try {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to delete product. Please try again.');
    }
}

public function search(Request $request){
    
            $products= Products::where('name', 'like', '%' . $search . '%')
                ->orWhere('details', 'like', '%' . $search . '%');

                 return view('admin.product.index',compact('products'));

        
}
}