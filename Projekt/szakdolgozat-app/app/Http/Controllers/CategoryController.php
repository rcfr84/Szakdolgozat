<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckRole:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        
        if (!$categories) 
        {
            return redirect()->route('/dashboard')->with('status', 'Category not found!');
        }

        return view('categories.index', compact('categories'));
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->save();

        return redirect()->route('categories.index')->with('status', 'Category created successfully!');
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
    public function edit($id)
    {
        $category = Category::find($id);

        if (!$category) 
        {
            return redirect()->route('/dashboard')->with('status', 'Category not found!');
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) 
        {
            return redirect()->route('/dashboard')->with('status', 'Category not found!');
        }

        $request->validate([
            'name' => 'required',
        ]);

        $category->name = $request->name;
        $category->update();

        return redirect()->route('categories.index')->with('status', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) 
        {
            return redirect()->route('/dashboard')->with('status', 'Category not found!');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('status', 'Category deleted successfully!');
    }
}
