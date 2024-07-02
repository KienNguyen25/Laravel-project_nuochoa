<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    const DEFAULT_STATUS = 0;
    const ASSIGNED_STATUS = 1;

    public function getStatusTextAttrbute()
    {
        return $this->statusArr[$this->status];
    }

    protected $table = "categories";
    protected $fillable = [
        'name',
        'image',
        'description',
        'status'
    ];

    public $statusArr = [
        self::DEFAULT_STATUS => 'Mặc định',
        self::ASSIGNED_STATUS => 'Đã gán với sản phẩm'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

}
