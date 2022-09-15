<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'pro_title',
        'category',
        'brand',
        'description',
        'pic',
        'pro_price',
        'status'
    ];
}
