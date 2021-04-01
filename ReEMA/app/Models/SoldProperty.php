<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldProperty extends Model
{
    use HasFactory;
    protected $table = 'propertyacquired';
    protected $fillable = ['Householder','Owner','PropId'];
    
}
