<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    //esto es el modelo que corresponde a la migración de Profesor
    //el nombre del ORM de Laravel es Eloquent

    //nombre de la tabla
    protected $table = 'profesor';

    //campos que hay que rellenar antes de guardar un objeto en la base de datos
    protected $fillable = [
        'nombre',
        'apellidos',
        'especialidad',
        'fecha_alta',
        'salario',
    ];

    /**
     * Alias para permitir acceder o asignar 'apellido' como alias de 'apellidos'
     */
    public function getApellidoAttribute(): ?string
    {
        return $this->attributes['apellidos'] ?? null;
    }

    public function setApellidoAttribute($value): void
    {
        $this->attributes['apellidos'] = $value;
    }

    /**
     * Alias para permitir acceder o asignar 'fecha_de_alta' como alias de 'fecha_alta'
     */
    public function getFechaDeAltaAttribute(): ?string
    {
        return $this->attributes['fecha_alta'] ?? null;
    }

    public function setFechaDeAltaAttribute($value): void
    {
        $this->attributes['fecha_alta'] = $value;
    }
}
