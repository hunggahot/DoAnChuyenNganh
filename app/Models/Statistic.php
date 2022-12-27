<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date', 'sales', 'profit', 'quantity', 'total_order'
    ];
    protected $table = 'tbl_statistical';
    protected $primaryKey = 'id_statistical';
}
