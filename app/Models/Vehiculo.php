<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    // Definimos la tabla asociada a este modelo
    protected $table = 'vehiculos';

    // Definimos los campos que se pueden asignar masivamente
    protected $fillable = [
        'placa',
        'modelo',
        'propietario',
    ];

    // Relación con la tabla 'entradas'
    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'vehiculo_id');
    }
}
