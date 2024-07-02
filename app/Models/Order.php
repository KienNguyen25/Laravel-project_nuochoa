<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;

    
    const STATUS = [
        'DA_DAT_HANG' => 1,
        'DA_XAC_NHAN' => 2,
        'DANG_VAN_CHUYEN' => 3,
        'DA_GIAO_HANG' => 4,
        'YEU_CAU_HUY' => 5,
        'DA_BI_HUY' => 6
    ];

    protected $statusArr = [
        '1'=>'Đã đặt hàng',
        '2'=>'Đã xác nhận',
        '3'=>'Đang vận chuyển',
        '4'=>'Đã giao hàng',
        '5'=>'Yêu cầu hủy',
        '6'=>'Đã bị hủy'
    ];
    public function getStatusTextAttribute(){
        return $this->statusArr [$this->status];
    }
    public function user(){
        return $this-> belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price')->withTimestamps();
    }
}
