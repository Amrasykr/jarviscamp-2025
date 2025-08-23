<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        // get all data from model with elequent orm
        $item = Item::all();

        // return item as a response with message and status code
        return response()->json([
            'message' => 'Items retrieved successfully',
            'data' => $item
        ], 200);
    }

    public function store(Request $request) {

        // store all request data to database with elequent orm
        $item = Item::create($request->all());

        // return created item as a response with message and status code
        return response()->json([
            'message' => 'Item created successfully',
            'data' => $item
        ], 201);
    }

    public function update(Request $request, $id) {
        // find item data by id requested to be update
        $item = Item::find($id);

        // update item data according to request
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
        
        // delete item data 
        $item->delete();

        // return response with message and status code
        return response()->json([
            'message' => 'Item deleted successfully',
        ], 200);
    }
}
