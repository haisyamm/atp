<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterHarga extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'asal_id','tujuan_id','asal_area', 'tujuan_area', 'alamat_asal','alamat_tujuan','harga','estimasi'];
}
