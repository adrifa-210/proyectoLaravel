<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alumnos = [
            [
                'nombre' => 'Fátima',
                'apellido' => 'Ajarif Saika',
                'fnac' => '2004-03-15',
                'genero' => 'femenino',
                'notaacceso' => 8.75,
            ],
            [
                'nombre' => 'Antonio',
                'apellido' => 'Albarrán Joya',
                'fnac' => '2003-07-22',
                'genero' => 'masculino',
                'notaacceso' => 7.20,
            ],
            [
                'nombre' => 'Adrián',
                'apellido' => 'Burgos Tomé',
                'fnac' => '2004-11-05',
                'genero' => 'masculino',
                'notaacceso' => 8.90,
            ],
            [
                'nombre' => 'Pablo',
                'apellido' => 'Carrascosa Delgado',
                'fnac' => '2005-02-18',
                'genero' => 'masculino',
                'notaacceso' => 7.80,
            ],
            [
                'nombre' => 'Joaquín',
                'apellido' => 'Castillo García',
                'fnac' => '2004-09-30',
                'genero' => 'masculino',
                'notaacceso' => 6.50,
            ],
            [
                'nombre' => 'Amara',
                'apellido' => 'El Issmail Al Assaf',
                'fnac' => '2003-05-12',
                'genero' => 'femenino',
                'notaacceso' => 9.15,
            ],
            [
                'nombre' => 'Adrián',
                'apellido' => 'Fernández Álvarez',
                'fnac' => '2005-01-25',
                'genero' => 'masculino',
                'notaacceso' => 8.10,
            ],
            [
                'nombre' => 'Abraham',
                'apellido' => 'Galdón Fernández',
                'fnac' => '2002-10-14',
                'genero' => 'masculino',
                'notaacceso' => 6.95,
            ],
            [
                'nombre' => 'Ignacio',
                'apellido' => 'García González',
                'fnac' => '2005-08-03',
                'genero' => 'masculino',
                'notaacceso' => 7.40,
            ],
            [
                'nombre' => 'Pilar',
                'apellido' => 'García López',
                'fnac' => '2005-04-19',
                'genero' => 'femenino',
                'notaacceso' => 9.60,
            ],
            [
                'nombre' => 'Raúl',
                'apellido' => 'Gorlat Castro',
                'fnac' => '2005-06-11',
                'genero' => 'masculino',
                'notaacceso' => 7.00,
            ],
            [
                'nombre' => 'Iván',
                'apellido' => 'Hernández Recio',
                'fnac' => '1995-12-08',
                'genero' => 'masculino',
                'notaacceso' => 8.50,
            ],
            [
                'nombre' => 'Noussayr',
                'apellido' => 'Kordass Rjaf-Allah',
                'fnac' => '2005-03-27',
                'genero' => 'masculino',
                'notaacceso' => 7.75,
            ],
            [
                'nombre' => 'Manuel',
                'apellido' => 'Maldonado Navarro',
                'fnac' => '2002-09-17',
                'genero' => 'masculino',
                'notaacceso' => 6.80,
            ],
            [
                'nombre' => 'Pedro',
                'apellido' => 'Montero Pelegrina',
                'fnac' => '2003-11-29',
                'genero' => 'masculino',
                'notaacceso' => 8.30,
            ],
            [
                'nombre' => 'Alba',
                'apellido' => 'Montoro Ruiz',
                'fnac' => '2005-07-04',
                'genero' => 'femenino',
                'notaacceso' => 9.25,
            ],
            [
                'nombre' => 'Christian',
                'apellido' => 'Pérez Montalbán',
                'fnac' => '2005-05-20',
                'genero' => 'masculino',
                'notaacceso' => 7.10,
            ],
            [
                'nombre' => 'José',
                'apellido' => 'Sánchez Sorroche',
                'fnac' => '2005-08-14',
                'genero' => 'masculino',
                'notaacceso' => 8.00,
            ],
            [
                'nombre' => 'Pablo',
                'apellido' => 'Serrano Rodríguez',
                'fnac' => '2003-04-09',
                'genero' => 'masculino',
                'notaacceso' => 7.60,
            ],
            [
                'nombre' => 'Gonzalo Jesús',
                'apellido' => 'Vereda Orozco',
                'fnac' => '2005-10-02',
                'genero' => 'masculino',
                'notaacceso' => 8.85,
            ],
            [
                'nombre' => 'Francisco Javier',
                'apellido' => 'Vicaria García',
                'fnac' => '2000-01-16',
                'genero' => 'masculino',
                'notaacceso' => 7.30,
            ],
            [
                'nombre' => 'Blas',
                'apellido' => 'Vilar Martín',
                'fnac' => '2006-02-23',
                'genero' => 'masculino',
                'notaacceso' => 8.40,
            ],
            [
                'nombre' => 'Luis',
                'apellido' => 'Villegas Rivera',
                'fnac' => '2004-12-01',
                'genero' => 'masculino',
                'notaacceso' => 6.70,
            ],
        ];

        foreach ($alumnos as $alumno) {
            Alumno::updateOrCreate(
                [
                    'nombre' => $alumno['nombre'],
                    'apellido' => $alumno['apellido'],
                ],
                $alumno
            );
        }
    }
}
