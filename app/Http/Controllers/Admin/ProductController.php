<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderByDesc('id')->paginate(10);
        // $order = Order::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
       // $product = new Product();
        return view('admin.products.create', compact('categories', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate Data
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'img' => 'required|image|mimes:png,jpg,jpeg,svg,gif',
            'details' => 'required',
            'status' => 'required',
            'employee_id' => 'nullable|exists:employee,id',
        ]);

        // Upload Images
        $img = $request->file('image');
        $img_name = rand(). time().$img->getClientOriginalName();
        $img->move(public_path('uploads/products'), $img_name);


        // Store To Database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'img' => $img_name,
            'details' => $request->details,
            'status' => $request->status,
            'employee_id' => $request->employee_id,
        ]);

        // Redirect
        return redirect()->route('admin.products.index')->with('msg', 'Product added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::findOrFail($id);
        // $product = Product::find($id);

        // if(!$product) {
        //     abort(404);
        // }

        // dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate Data
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'img' => 'required|image|mimes:png,jpg,jpeg,svg,gif',
            'details' => 'required',
            'status' => 'required',
            'employee_id' => 'nullable|exists:employee,id',
        ]);

        $product = Product::findOrFail($id);

        // Upload Images
        $img_name = $product->image;
        if($request->hasFile('image')) {
            File::delete(public_path('uploads/products/'.$product->image));
            $img = $request->file('image');
            $img_name = rand(). time().$img->getClientOriginalName();
            $img->move(public_path('uploads/products'), $img_name);
        }

        // Store To Database
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'img' => $img_name,
            'details' => $request->details,
            'status' => $request->status,
            'employee_id' => $request->employee_id,
        ]);

        // Redirect
        return redirect()->route('admin.products.index')->with('msg', 'Product updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        File::delete(public_path('uploads/products/'.$product->image));

        $product->delete();
        return redirect()->route('admin.products.index')->with('msg', 'Product deleted successfully')->with('type', 'danger');
    }
}
