<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    use HasFactory;
    protected $fillable=['manhanvien','tennhanvien','ngaysinh','gioitinh','diachi','sodienthoai'];
}
