<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryChild extends Model
{
    use HasFactory;
    protected $table = 'category_child';
    protected $fillable = [
        'id',
        'category_dad_id',
        'name',
    ];

    // public function products()
    // {
    //     return $this->hasMany(Product::class, 'category_child_id', 'id');
    // }

    public function categoryDad()
    {
        return $this->belongsTo(CategoryDad::class, 'category_dad_id', 'id');
    }
}
