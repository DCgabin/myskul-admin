<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $products = Product::latest()
            ->paginate(15)->withQueryString();
        return \view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return View
     */
    public function store(Request $request) : View
    {
        $product = $request->validate([
            'name' => ['string', 'min:3', 'max:255', 'required'],
            'price' => ['integer', 'min:100', 'required'],
            'description' => ['string', 'min:5', 'required'],
            'pictureURL' => ['file', 'image']
        ]);

        $pictureURL = '';

        if (isset($product['pictureURL'])) {
            $filepath = \Storage::disk('public')->put('products/images', $request->pictureURL);
            $pictureURL = asset('storage/' . $filepath);
        }

        $product['pictureURL'] = $pictureURL;

        Product::create($product);

        session()->flash('new-product', 'Produit créer avec succès !');

        return \view('products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->deleteOrFail();

        session()->flash('delete-product', 'Produit supprimé avec succès!');

        return redirect()->back();
    }
}
