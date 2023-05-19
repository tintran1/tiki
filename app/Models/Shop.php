<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'shop';
    protected $fillable = [
        'user_role_id',
        'name',
        'avatar',
        'shopee_mall',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id', 'id');
    }
    
}
