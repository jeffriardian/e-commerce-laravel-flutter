<?php

namespace App\Http\Controllers;

use App\Models\Product as Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        
        return response([
            'success' => true,
            'message' => 'List of All Products',
            'data' => $products
        ], 200);
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
    public function store(ProductRequest $request)
    {
        $data= $request->validated();

        $products = Product::create([
            'category_id'   => $request->input('category_id'),
            'name'          => $request->input('name'),
            'description'   => $request->input('description'),
            'units'         => $request->input('units'),
            'price'         => $request->input('price'),
            'image'         => $request->input('image'),
        ]);

        if ($products) {
            return response()->json([
                'success' => true,
                'message' => 'Products Created! ',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Error Creating Product!',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $products = Product::whereId($id)->first();

        if ($products) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Product!',
                'data'    => $products
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found!',
                'data'    => ''
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    public function uploadFile(Request $request)
    {
        if($request->hasFile('image')){
            $name = time()."_".$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $name);
        }
        return response()->json(asset("images/$name"),201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        $data= $request->validated();            
        
        $products = Product::whereId($id)->update([
            'category_id'   => $request->get('category_id'),
            'name'          => $request->get('name'),
            'description'   => $request->get('description'),
            'units'         => $request->get('units'),
            'price'         => $request->get('price'),
            'image'         => $request->get('image'),
        ]);
        
        if ($products) {
            return response()->json([
                'success' => true,
                'message' => 'Product Updated!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Error Updating Product!',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);

        $products->delete();
        
        if ($products) {
            return response()->json([
                'success' => true,
                'message' => 'Product Deleted!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Error Deleting Product!',
            ], 500);
        }
    }
}
