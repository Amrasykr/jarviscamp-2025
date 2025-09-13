<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoanController extends Controller
{
    /**
     * Menampilkan daftar semua pinjaman
     */
    public function index()
    {
        $loans = Loan::with(['borrower', 'approver', 'item.category'])
                    ->orderBy('created_at', 'desc')
                    ->get();

        if ($loans->isEmpty()) {
            return response()->json([
                'message' => 'No loans found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Loans retrieved successfully',
            'data' => $loans
        ], 200);
    }

    /**
     * Membuat pinjaman baru
     */
    public function store(Request $request)
    {

        $loan = Loan::create($request->all());
        $loan->load(['borrower', 'item.category']);

        return response()->json([
            'message' => 'Loan request created successfully',
            'data' => $loan
        ], 201);
    }

    public function approve(Request $request, $id)
    {
       $loan = Loan::find($id);

       $loan->update([
            'status' => 'approved',
            'approver_id' => $request->approver_id
        ]);

        $item = Item::find($loan->item_id);
        $item->update(['status' => 'unavailable']);

        $loan->load(['borrower', 'approver', 'item.category']);

        return response()->json([
            'message' => 'Loan approved successfully',
            'data' => $loan
        ], 200);
    }

    /**
     * Mengembalikan barang
     */
    public function return($id)
    {
        $loan = Loan::find($id);

        $loan->update([
            'status' => 'returned',
            'end_date' => Carbon::now()->toDateString()
        ]);

        // Load relasi untuk response
        $loan->load(['borrower', 'approver', 'item.category']);

        $item = Item::find($loan->item_id);
        $item->update(['status' => 'available']);

        return response()->json([
            'message' => 'Item returned successfully',
            'data' => $loan
        ], 200);
    }

    /**
     * Menampilkan detail pinjaman
     */
    public function show($id)
    {
        $loan = Loan::with(['borrower', 'approver', 'item.category'])->find($id);

        if (!$loan) {
            return response()->json([
                'message' => 'Loan not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Loan retrieved successfully',
            'data' => $loan
        ], 200);
    }

    /**
     * Filter loans berdasarkan status
     */
    public function getByStatus($status)
    {
        $validStatuses = ['pending', 'approved', 'returned'];

        if (!in_array($status, $validStatuses)) {
            return response()->json([
                'message' => 'Invalid status',
                'valid_statuses' => $validStatuses
            ], 400);
        }

        $loans = Loan::with(['borrower', 'approver', 'item.category'])
                    ->where('status', $status)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return response()->json([
            'message' => "Loans with status '{$status}' retrieved successfully",
            'data' => $loans
        ], 200);
    }
}
