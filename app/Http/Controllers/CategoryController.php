<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        // get all data from model with Eloquent ORM
        $categories = Category::all();

        // send response if data is empty
        if ($categories->isEmpty()) {
            return response()->json([
                'message' => 'No categories found',
                'data' => []
            ], 404);
        }

        // return categories as a response with message and status code
        return response()->json([
            'message' => 'Categories retrieved successfully',
            'data' => $categories
        ], 200);
    }

    public function store(Request $request) {
        // validate request 
        $category = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string'
        ]);

        // store validated data to database with Eloquent ORM
        $category = Category::create($category);

        // return created category as a response with message and status code
        return response()->json([
            'message' => 'Category created successfully',
            'data' => $category
        ], 201);
    }

    public function update(Request $request, $id) {
        // find category data by id requested to be updated
        $category = Category::find($id);

        // send response if selected category not found
        if (!$category) {
            return response()->json([
                'message' => 'Category not found',
            ], 404);
        }

        // validate request
        $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'sometimes|nullable|string'
        ]);

        // update category data
        $category->update($request->all());

        // return updated category as a response with message and status code
        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $category
        ], 200);
    }

    public function destroy($id) {
        // find category data by id requested to be deleted
        $category = Category::find($id);

        // send response if selected category not found
        if (!$category) {
            return response()->json([
                'message' => 'Category not found',
            ], 404);
        }

        // delete category data
        $category->delete();

        // return response with message and status code
        return response()->json([
            'message' => 'Category deleted successfully',
        ], 200);
    }
}