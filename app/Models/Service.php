<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    
    protected $fillable = [
        'service_icon1','service_value1','service_desc1','service_icon2','service_value2','service_desc2','service_icon3','service_value3','service_desc3',
    ];
}
