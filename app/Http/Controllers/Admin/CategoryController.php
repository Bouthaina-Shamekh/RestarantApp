<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $categories = Category::orderByDesc('id')->paginate(5);

        // return "hello bouthaina ";

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $categories = Category::all();
        // $categories = Category::select('id', 'name', 'type')->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',

        ]);

         // Store To Database
         Category::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        // Redirect
        return redirect()->route('admin.categories.index')->with('msg', 'Category added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $category = Category::findOrFail($id);

        // Store To Database
        $category->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        // Redirect
        return redirect()->route('admin.categories.index')->with('msg', 'Category updated successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('msg', 'Category deleted successfully')->with('type', 'danger');

    }
}
