<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clips extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','ruta','descripcion','confirmado'
    ];
}
