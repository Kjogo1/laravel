<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $products = Product::orderBy('id', 'DESC')->paginate(3);
        $products = Product::orderBy('id', 'DESC')->get();
        // $products = Product::all();
        // dd($products);
        return response()->json(['products' => $products]);
        // return $products;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        // $product = Product::create($request->all());

        // dd($request);
        if($request->hasFile('image')) {
            $img = $request->file('image');
            // $filename = time().'.'.$image->getClientOriginalExtension();
            // Image::make($image)
            $file = $img->store('products', 'public');
            // $file =  Storage::putFile('uploads', $img, 'public');
        }

        // $filename = $request->file('image')->store('products');

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $file,
            'rating' => $request->rating,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'discount_id' => $request->discount_id,
            'user_id' => $request->user_id
        ]);
        return response()->json(['product' => $product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        // $category = Category::find($product->category_id);

        // dd($product->category->all());
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)

   {
        //
    }

    public function categories() {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function discounts() {
        $discount = Discount::all();
        return response()->json($discount);
    }
}
