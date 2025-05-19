<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
        return view('products.index', ['products' => Product::with('category')->simplePaginate(10)]);
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
            $filename = null;

            if ($request->image) {
                $image = $request->image;
                $filename = Carbon::now()->format('YmdHis') . '.' . $image->extension();
                $image->storeAs('images', $filename, 'public');
            }

            Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $filename
            ]);

            return redirect()->route('products.index')->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->route('products.index')->with('error', 'An error occurred while creating the product');
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
            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::disk('public')->delete('images/' . $product->image);
                }

                $image = $request->image;
                $filename = Carbon::now()->format('YmdHis') . '.' . $image->extension();
                $image->storeAs('images', $filename, 'public');

                $product->image = $filename;
            }

            $product->name = $request->name;
            $product->category_id = $request->category_id;            
            $product->description = $request->description;
            $product->price = $request->price;
            
            $product->save();

            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'An error occurred while updating the product');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            if ($product->image) {
                Storage::disk('public')->delete('images/' . $product->image);
            }
            
            $product->delete();

            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'An error occurred while deleting the product');
        }
    }
}
