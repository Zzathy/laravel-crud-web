<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            Category::create([
                'name' => $request->name
            ]);

            session()->flash('success', 'Category created successfully');
    
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while creating the category');

            return redirect()->route('categories.index');
        }
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
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->name = $request->name;

            $category->save();

            session()->flash('success', 'Category updated successfully');

            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while updating the category');

            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            session()->flash('success', 'Category deleted successfully');

            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while updating the category');

            return redirect()->route('categories.index');
        }
    }
}
