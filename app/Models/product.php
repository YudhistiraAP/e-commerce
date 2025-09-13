<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'slug'
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
