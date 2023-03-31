<?php

namespace App\Http\Controllers;

use App\Models\Category as Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        
        return response([
            'success' => true,
            'message' => 'List of All Categories',
            'data' => $categories
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
    public function store(CategoryRequest $request)
    {
        $data= $request->validated();

        $categories = Category::create($data);

        if ($categories) {
            return response()->json([
                'success' => true,
                'message' => 'Category Created! ',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Error Creating Category!',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Category::whereId($id)->first();

        if ($categories) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Category!',
                'data'    => $categories
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category Not Found!',
                'data'    => ''
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $data= $request->validated();            
        
        $categories = Category::whereId($id)->update([
            'name'          => $request->get('name'),
        ]);
        
        if ($categories) {
            return response()->json([
                'success' => true,
                'message' => 'Category Updated!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Error Updating Category!',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);

        $categories->delete();
        
        if ($categories) {
            return response()->json([
                'success' => true,
                'message' => 'Category Deleted!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Error Deleting Category!',
            ], 500);
        }
    }
}
