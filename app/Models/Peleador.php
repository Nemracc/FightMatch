<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Peleador extends Model
{
    use HasFactory;
    protected $table = "peleadores";
    protected $fillable = ['nombre', 
    'edad', 
    'peso', 
    'peleas', 
    'academia', 
    'academia_distancia', 
    'ci', 
    'sexo',
    'modalidad_id'];

    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'modalidad_id');
    }
}
