<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistical extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_date',
        'profit',
        'sales',
        'quantity',
        'total_order'
    ];
}
