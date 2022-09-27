<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Why extends Model
{
    use HasFactory;
    protected $table = 'why';
    
    protected $fillable = [
        'why_icon1','why_value1','why_sub1','why_desc1','why_icon2','why_value2','why_sub2','why_desc2','why_icon3','why_value3','why_sub3','why_desc3','why_icon4','why_value4','why_sub4','why_desc4',
    ];
}
