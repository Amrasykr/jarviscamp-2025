<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        
    ];


    /**
     * Relasi hasMany ke Item
     * Satu category has many (memiliki banyak) items
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
