<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loans';

    protected $fillable = [
        'borrower_id',
        'approver_id',
        'item_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function borrower()
    {
        return $this->belongsTo(User::class, 'borrower_id');
    }
    
    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeReturned($query)
    {
        return $query->where('status', 'returned');
    }
}
