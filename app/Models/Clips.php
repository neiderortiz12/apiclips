<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clips extends Model
{
    use HasFactory;
    protected $fillable = [
        'user','nombre','clip','descripcion','confirmado'
    ];

    protected $hidden =[
        'created_at','updated_at'
    ];
}
