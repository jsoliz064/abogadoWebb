<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbogadoExpediente extends Model
{
    use HasFactory;
    protected $table="abogado_expedientes";
    protected $guarded=['id','created_at','updated_at'];
}
