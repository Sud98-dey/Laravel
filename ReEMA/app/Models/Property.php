<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable=[
     'OwnerId','RegNo','HouseNo','Society_Name',
     'Locality','Landmark','Area','City','Purpose',
     'Type','SubType','Status','C_Status','Desc','Profile'
    ];    
}
