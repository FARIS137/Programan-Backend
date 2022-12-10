<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    use HasFactory;
    
    
    #define model attributes to make mass assignable
    protected $table = 'patients';
    
    protected $fillable = ['name', 'phone', 'address', 'status'];
}

