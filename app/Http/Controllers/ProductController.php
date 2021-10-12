<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = DB::table('users')->join('products', 'users.id', '=', 'products.user_id')->select('users.name AS userName', 'products.name', 'products.description', 'products.price')->get();

        return response()->json($products);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product();

        $product->name = $request->name;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->user_id = $request->user_id;

        $product->save();

        return response()->json(['message' => 'Product created successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::find($id);

        return response()->json($product);

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

        $product = Product::find($id);

        DB::table('users')->where('id', $product)->update(['name' => $request->name, 'description' => $request->description, 'price' => $request->price]);

        return response()->json(['message' => 'Product updated data successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::find($id);

        $product->destroy();

        return response()->json(['message' => 'Product deleted successfully']);

    }
}
