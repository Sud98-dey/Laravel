<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscriber extends Model
{
    use HasFactory;
    protected $table='subscriber';
    protected $fillable=['Id','Amount','Payment_Mode'];
}