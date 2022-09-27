<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    
    protected $fillable = [
        'address','maps_link','ho_telp','ho_email','oo_telp','oo_email','mo_telp','mo_email','facebook','instagram','whatsapp','youtube','linkedin','telegram'
    ];
}
