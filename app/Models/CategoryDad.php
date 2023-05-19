<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDad extends Model
{
    use HasFactory;
    protected $table = 'category_dad';
    protected $fillable = [
        'id',
        'name',
        'img',
    ];

    public function categoryChildren()
    {
        return $this->hasMany(CategoryChild::class , 'category_dad_id', 'id');
    }
}
