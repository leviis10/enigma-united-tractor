<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_category_id",
        'name',
        'price',
        'image',
        "user_id"
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, "product_category_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
