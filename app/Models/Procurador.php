<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procurador extends Model
{
    use HasFactory;
    protected $table="procuradors";
    protected $guarded=['id','created_at','updated_at'];

}
