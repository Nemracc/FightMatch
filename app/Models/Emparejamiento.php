<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Emparejamiento extends Model
{
    use HasFactory;

    protected $table = "emparejamiento";

    public static function generarEmparejamientos($diferenciaPesoMax, $diferenciaPeleasMax)
    {
        return DB::select('
            SELECT 
                p1.id AS peleador1_id,
                p1.nombre AS peleador1_nombre,
                p1.peso as peso_1,
                p1.peleas as peleas_1,
                p1.academia as academia_1, 
                p1.edad as edad_1,
                p2.id AS peleador2_id,
                p2.nombre AS peleador2_nombre,
                p2.peso as peso_2,
                p2.peleas as peleas_2,
                p2.academia as academia_2,
                p2.edad as edad_2,
                m.descripcion AS modalidad
            FROM 
                generar_emparejamientos(?, ?) AS emp
            JOIN 
                peleadores p1 ON emp.peleador1_id = p1.id
            JOIN 
                peleadores p2 ON emp.peleador2_id = p2.id
            JOIN 
                modalidad m ON emp.modalidad_id = m.id
            where p1.id not in (select peleador1_id
                                from emparejamiento
                                union all
                                select peleador2_id
                                from emparejamiento)
            and p2.id not in (select peleador1_id
                                from emparejamiento
                                union all
                                select peleador2_id
                                from emparejamiento)
        ', [$diferenciaPesoMax, $diferenciaPeleasMax]);
    }

    public static function RecuperaEmparejamientos()
    {
        return DB::select('
            SELECT 
                p1.id AS peleador1_id,
                p1.nombre AS peleador1_nombre,
                p1.peso as peso_1,
                p1.peleas as peleas_1,
                p1.academia as academia_1, 
                p1.edad as edad_1,
                p2.id AS peleador2_id,
                p2.nombre AS peleador2_nombre,
                p2.peso as peso_2,
                p2.peleas as peleas_2,
                p2.academia as academia_2,
                p2.edad as edad_2,
                m.descripcion AS modalidad,
                emp.id
            FROM 
                emparejamiento emp
            JOIN 
                peleadores p1 ON emp.peleador1_id = p1.id
            JOIN 
                peleadores p2 ON emp.peleador2_id = p2.id
            JOIN 
                modalidad m ON p1.modalidad_id = m.id
        ');
    }

    protected $fillable = [
        'peleador1_id',
        'peleador2_id',
        'fecha',
        'resultado',
    ];

    // Relación con la tabla peleadores
    public function peleador1()
    {
        return $this->belongsTo(Peleador::class, 'peleador1_id');
    }

    public function peleador2()
    {
        return $this->belongsTo(Peleador::class, 'peleador2_id');
    }
}
