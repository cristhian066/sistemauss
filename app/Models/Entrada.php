<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Entrada extends Model
{
    use HasFactory;

    // Definimos la tabla asociada a este modelo
    protected $table = 'entradas';

    // Definimos los campos que se pueden asignar masivamente
    protected $fillable = [
        'vehiculo_id',
        'fecha',
    ];

    // Establecemos la fecha por defecto al crear una nueva entrada
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->fecha)) {
                $model->fecha = Carbon::now();
            }
        });
    }

    // Relación con la tabla 'vehiculos'
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }
}
