<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'about';
    
    protected $fillable = [
        'about','company_icon1','company_value1','company_desc1','company_icon2','company_value2','company_desc2'
    ];
}
