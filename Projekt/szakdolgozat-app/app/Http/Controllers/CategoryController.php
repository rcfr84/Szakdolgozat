<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('CheckRole:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    */
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

        if (!$category) 
        {
            return redirect()->route('/allCategories')->with('status', 'Nincsen ilyen kategória!');
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);

        if (!$category) 
        {
            return redirect()->route('/allCategories')->with('status', 'Nincsen ilyen kategória!');
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

        if (!$category) 
        {
            return redirect()->route('/allCategories')->with('status', 'Nincsen ilyen kategória!');
        }

        $category->delete();

        return redirect()->route('categories.action')->with('status', 'Sikeres törlés!');
    }

    public function action()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
}
