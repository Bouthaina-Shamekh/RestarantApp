<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DeliveryAgent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DeliveryAgentController extends Controller
{
    public function index()
    {

        $deliveries = DeliveryAgent::orderByDesc('id')->paginate(5);

        // return "hello bouthaina ";

        return view('admin.deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $deliveries = DeliveryAgent::all();
        // $deliveries = delivery::select('id', 'name', 'type')->get();
        return view('admin.deliveries.create', compact('deliveries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'img' => 'nullable',
        ]);

         $img = $request->file('image');
         $img_name = rand() . time() . $img->getClientOriginalName();
         $img->move(public_path('uploads/deliveries'), $img_name);


         // Store To Database
         DeliveryAgent::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'status' => $request->status,
            'age' => $request->age,
            'phone' => $request->phone,
            'img' => $img_name,
        ]);

        // Redirect
        return redirect()->route('admin.deliveries.index')->with('msg', 'delivery added successfully')->with('type', 'success');
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
        $delivery = DeliveryAgent::findOrFail($id);

        return view('admin.deliveries.edit', compact('delivery'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'img' => 'nullable',
        ]);

        $delivery = DeliveryAgent::findOrFail($id);

        // Upload File

        $img_name = $delivery->img;
        if($request->hasFile('image')) {
           $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/deliveries'), $img_name);
       }

        // Store To Database
        $delivery->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'status' => $request->status,
            'age' => $request->age,
            'phone' => $request->phone,
            'img' => $img_name,
        ]);

        // Redirect
        return redirect()->route('admin.deliveries.index')->with('msg', 'delivery updated successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delivery = DeliveryAgent::findOrFail($id);
        File::delete(public_path('uploads/deliveries/'.$delivery->img));
        $delivery->delete();

        return redirect()->route('admin.deliveries.index')->with('msg', 'delivery deleted successfully')->with('type', 'danger');

    }
}
