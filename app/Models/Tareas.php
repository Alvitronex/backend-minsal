<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tareas';

    protected $fillable = [
        'titulo',
        'descripcion',
        'prioridad',
        'fecha_limite',
    ];

    protected $casts = [
        'fecha_limite' => 'date:Y-m-d',
    ];
}