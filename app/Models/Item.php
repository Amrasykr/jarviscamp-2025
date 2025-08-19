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
    protected $fillable = ['name', 'description', 'status'];
}
