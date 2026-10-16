<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    
use Hasfactory, softDelete
protected $fillable = [
'title',
'descripcion',
'prioridad'
]


}
