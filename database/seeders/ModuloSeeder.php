<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulos = [
            [
                'nombre' => 'Desarrollo Web en Entorno Servidor',
                'abreviatura' => 'DWES',
                'horas' => 168,
                'creditos' => 12.00,
            ],
            [
                'nombre' => 'Desarrollo Web en Entorno Cliente',
                'abreviatura' => 'DWEC',
                'horas' => 147,
                'creditos' => 9.00,
            ],
            [
                'nombre' => 'Diseño de Interfaces Web',
                'abreviatura' => 'DIW',
                'horas' => 126,
                'creditos' => 8.00,
            ],
            [
                'nombre' => 'Despliegue de Aplicaciones Web',
                'abreviatura' => 'DAW',
                'horas' => 84,
                'creditos' => 6.00,
            ],
            [
                'nombre' => 'Empresa e Iniciativa Emprendedora',
                'abreviatura' => 'EIE',
                'horas' => 84,
                'creditos' => 4.00,
            ],
            [
                'nombre' => 'Horas de Libre Configuración',
                'abreviatura' => 'HLC',
                'horas' => 63,
                'creditos' => 3.00,
            ],
            [
                'nombre' => 'Proyecto de Desarrollo de Aplicaciones Web',
                'abreviatura' => 'PROY',
                'horas' => 40,
                'creditos' => 5.00,
            ],
            [
                'nombre' => 'Formación en Centros de Trabajo',
                'abreviatura' => 'FCT',
                'horas' => 370,
                'creditos' => 22.00,
            ],
        ];

        foreach ($modulos as $modulo) {
            Modulo::updateOrCreate(
                ['abreviatura' => $modulo['abreviatura']],
                $modulo
            );
        }
    }
}
