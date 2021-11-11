<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    const STATUS = [
      0 => 'Đang xử lý',
      1 => 'Khách hàng mới'
    ];
}
