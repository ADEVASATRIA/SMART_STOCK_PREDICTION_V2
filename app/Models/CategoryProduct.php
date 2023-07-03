<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_products';
    protected $fillable = ['name_category_product'];

    public function products()
    {
        return $this->hasMany(Product::class, 'id');
    }
}
