<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    // use HasFactory trait to define dummy data in Factory File
    use HasFactory;

    // define table name for this model
    protected $table = 'items';

    // define fillable fields for this model from table
    protected $fillable = ['name', 'description', 'status', 'category_id'];

    /**
     * Relasi belongsTo ke Category
     * Satu item belongs to (dimiliki oleh) satu category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Loans untuk item ini
     */
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }


     /**
     * Cek apakah item sedang dipinjam
     */
    public function isCurrentlyBorrowed()
    {
        return $this->loans()
                   ->where('status', 'approved')
                   ->whereNull('end_date')
                   ->exists();
    }
}
