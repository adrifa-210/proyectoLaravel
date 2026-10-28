<?php

namespace Database\Seeders;

use App\Models\Profesor;
use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesores = [
            [
                'nombre' => 'Carmelo',
                'apellidos' => 'Vega Expósito',
                'especialidad' => 'Informática',
                'fecha_alta' => '2012-09-01',
                'salario' => 2650.00,
            ],
            [
                'nombre' => 'María del Carmen',
                'apellidos' => 'Romero Torres',
                'especialidad' => 'Informática',
                'fecha_alta' => '2015-09-01',
                'salario' => 2520.50,
            ],
            [
                'nombre' => 'Juan Manuel',
                'apellidos' => 'Sánchez Gómez',
                'especialidad' => 'Sistemas y Aplicaciones Informáticas',
                'fecha_alta' => '2018-10-15',
                'salario' => 2380.00,
            ],
            [
                'nombre' => 'Inmaculada',
                'apellidos' => 'Morales Fernández',
                'especialidad' => 'Formación y Orientación Laboral',
                'fecha_alta' => '2010-09-01',
                'salario' => 2750.00,
            ],
            [
                'nombre' => 'Francisco',
                'apellidos' => 'Pérez Benítez',
                'especialidad' => 'Informática',
                'fecha_alta' => '2020-01-10',
                'salario' => 2250.75,
            ],
            [
                'nombre' => 'Elena',
                'apellidos' => 'Ramos Delgado',
                'especialidad' => 'Inglés',
                'fecha_alta' => '2017-09-01',
                'salario' => 2450.00,
            ],
            [
                'nombre' => 'Antonio',
                'apellidos' => 'Molina Herrera',
                'especialidad' => 'Sistemas y Aplicaciones Informáticas',
                'fecha_alta' => '2019-09-15',
                'salario' => 2310.25,
            ],
        ];

        foreach ($profesores as $profesor) {
            Profesor::updateOrCreate(
                [
                    'nombre' => $profesor['nombre'],
                    'apellidos' => $profesor['apellidos'],
                ],
                $profesor
            );
        }
    }
}
