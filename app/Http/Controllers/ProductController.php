<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::select('id', 'name')->orderBy('name')->get();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', ['categories' => $this->categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id
            ]);

            session()->flash('success', 'Product created successfully');

            return redirect()->route('products.index');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while creating the product');

            return redirect()->route('products.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product, 'categories' => $this->categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category_id;            
            $product->save();

            session()->flash('success', 'Product updated successfully');

            return redirect()->route('products.index');
        } catch (\Exception $e) {

            session()->flash('error', 'An error occurred while updating the product');
            return redirect()->route('products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            session()->flash('success', 'Product deleted successfully');

            return redirect()->route('products.index');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while deleting the product');

            return redirect()->route('products.index');
        }
    }
}
