<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;

    protected $table = 'modalidad';

    protected $fillable = [
        'descripcion',
    ];

    public function peleadores()
    {
        return $this->hasMany(Peleador::class, 'modalidad_id');
    }
}
