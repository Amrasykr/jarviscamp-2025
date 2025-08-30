<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        // get all data from model with elequent orm
        $item = Item::all();

        if ($item->isEmpty()) {
            return response()->json([
                'message' => 'No items found',
                'data' => []
            ], 404);
        }

        // return item as a response with message and status code
        return response()->json([
            'message' => 'Items retrieved successfully',
            'data' => $item
        ], 200);

    }

    public function store(Request $request) {

        // validate request 
        $item = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:available,unavailable'
        ],
        [   
            'status.in' => 'The status must be either available or unavailable.'
        ]);

        // store all request data to database with elequent orm
        $item = Item::create($item);

        // return created item as a response with message and status code
        return response()->json([
            'message' => 'Item created successfully',
            'data' => $item
        ], 201);
    }

    

    public function update(Request $request, $id) {
        // find item data by id requested to be update
        $item = Item::find($id);

        // send response if selected item no found
        if (!$item) {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }

        // validate requeust
        $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|in:available,unavailable'
        ],
        [   
            'status.in' => 'The status must be either available or unavailable.'
        ]);

        $item->update($request->all());

        // return updated item as a response with message and status code
        return response()->json([
            'message' => 'Item updated successfully',
            'data' => $item
        ], 201);
    }

    public function destroy($id) {
        // find item data by id requested to be delete
         $item = Item::find($id);

        // send response if selected item no found
        if (!$item) {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }

        // delete item data 
        $item->delete();

        // return response with message and status code
        return response()->json([
            'message' => 'Item deleted successfully',
        ], 200);
    }
}
