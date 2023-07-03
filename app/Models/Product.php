<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'category_id'
    ];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_product', 'id');
    }
}
