<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VouchersModels extends Model
{
    use HasFactory;
    protected $table = 'tb_create_vouchers';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'amount', 'expiration_date', 'is_used'];
}