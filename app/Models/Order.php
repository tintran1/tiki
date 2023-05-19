<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'users_id', 
        'shippings_id',  
        'type',  
        'vendor_order_id',
        'transactions_id',
        'status',        
    ];
}
