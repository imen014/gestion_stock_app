<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('view_grayscale.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'string',
            'category'=>'string',
            'fournisseur'=>'string',
            'quantity'=>'integer',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'


        ]
            
        );
        




        $product = new Products();
        $product->product_name = $request->input('product_name');
        $product->category = $request->input('category');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        
        $newImageName = uniqid() . '-' . $request->input('product_name') . '.' . $request->image->extension;

        $request->image->move(public_path('images'), $newImageName);
        $product->save();
        return redirect()->route('index')->with('success', 'Produit supprimé avec succès.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::findOrFail($id);
        return view('show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        return view('edit', ['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name'=>'string',
            'category'=>'string',
            'fournisseur'=>'string',
            'quantity'=>'integer'

        ]
            
        );
        $product = Products::findOrFail($id);
        $product->product_name = $request->input('product_name');
        $product->quantity = $request->input('quantity');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->update();
        return redirect()->route('index')->with('success', 'Produit supprimé avec succès.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete(); // Use delete() instead of destroy()
        return redirect()->route('index')->with('success', 'Produit supprimé avec succès.');
    }
}
