<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryChild;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'id',
        'category_child_id',
        'shop_id',
        'title',
        'img',
        'video',
        'sold',
    ];

    public function categoryChild()
    {
        return $this->belongsTo(CategoryChild::class, 'category_child_id', 'id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
