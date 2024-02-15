<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('store', Category::class);

        $request->validate([
            'name' => 'required',
        ]);

        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->save();

        return redirect()->route('categories.action')->with('status', 'Sikeres hozzáadás!');
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
    public function edit($categoryId)
    {
        $category = Category::find($categoryId);

        $this->authorize('create', Category::class);

        if (!$category) 
        {
            return redirect()->route('categories.action')->with('error', 'Nincsen ilyen kategória!');
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);

        $this->authorize('update', Category::class);


        if (!$category) 
        {
            return redirect()->route('categories.action')->with('error', 'Nincsen ilyen kategória!');
        }

        $request->validate([
            'name' => 'required',
        ]);

        $category->name = $request->name;
        $category->update();

        return redirect()->route('categories.action')->with('status', 'Sikeres módosítás!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryId)
    {
        $category = Category::find($categoryId);

        $this->authorize('destroy', Category::class);

        if (!$category) 
        {
            return redirect()->route('categories.action')->with('error', 'Nincsen ilyen kategória!');
        }

        $category->delete();

        return redirect()->route('categories.action')->with('status', 'Sikeres törlés!');
    }

    public function action()
    {
        $this->authorize('action', Category::class);
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
}
