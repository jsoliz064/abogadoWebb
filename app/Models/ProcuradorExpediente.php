<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcuradorExpediente extends Model
{
    use HasFactory;
    protected $table="procurador_expedientes";
    protected $guarded=['id','created_at','updated_at'];
}
