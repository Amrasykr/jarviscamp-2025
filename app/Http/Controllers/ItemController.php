<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        // Mengambil semua item BESERTA kategorinya (Eager Loading)
        $items = Item::with('category')->get();

        if ($items->isEmpty()) {
            return response()->json([
                'message' => 'No items found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Items retrieved successfully',
            'data' => $items
        ], 200);
    }

    public function store(Request $request) {
        // Update validasi untuk include category_id
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:available,unavailable',
            'category_id' => 'required|exists:categories,id' // Validasi foreign key
        ],
        [
            'status.in' => 'The status must be either available or unavailable.',
            'category_id.exists' => 'The selected category does not exist.'
        ]);

        $item = Item::create($validatedData);

        // Load relasi category setelah create
        $item->load('category');

        return response()->json([
            'message' => 'Item created successfully',
            'data' => $item
        ], 201);
    }

    public function show($id) {
        // Mengambil satu item beserta kategorinya
        $item = Item::with('category')->find($id);

        if (!$item) {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }

        return response()->json([
            'message' => 'Item retrieved successfully',
            'data' => $item
        ], 200);
    }

    public function update(Request $request, $id) {
        $item = Item::find($id);

        if (!$item) {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }

        // Update validasi untuk include category_id
        $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|in:available,unavailable',
            'category_id' => 'sometimes|required|exists:categories,id'
        ],
        [
            'status.in' => 'The status must be either available or unavailable.',
            'category_id.exists' => 'The selected category does not exist.'
        ]);

        $item->update($request->all());

        // Load relasi category setelah update
        $item->load('category');

        return response()->json([
            'message' => 'Item updated successfully',
            'data' => $item
        ], 200);
    }

    public function destroy($id) {
        $item = Item::find($id);

        if (!$item) {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }

        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully',
        ], 200);
    }
}
