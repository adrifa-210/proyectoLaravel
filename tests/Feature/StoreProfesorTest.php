<?php

namespace Tests\Feature;

use App\Models\Profesor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreProfesorTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_stores_a_profesor_successfully(): void
    {
        $response = $this->post(route('profesor.store'), [
            'nombre' => 'Carlos',
            'apellidos' => 'García Ruiz',
            'especialidad' => 'Informática',
            'fecha_alta' => '2022-09-01',
            'salario' => '2450.50',
        ]);

        $response->assertRedirect(route('profesor.create'));
        $this->assertDatabaseHas('profesor', [
            'nombre' => 'Carlos',
            'apellidos' => 'García Ruiz',
            'especialidad' => 'Informática',
            'fecha_alta' => '2022-09-01',
            'salario' => 2450.50,
        ]);

        $this->get(route('profesor.index'))
            ->assertOk()
            ->assertSee('Carlos')
            ->assertSee('García Ruiz');
    }

    public function test_it_displays_profesor_show(): void
    {
        $profesor = Profesor::create([
            'nombre' => 'Laura',
            'apellidos' => 'Martínez',
            'especialidad' => 'Matemáticas',
            'fecha_alta' => '2021-01-15',
            'salario' => 2300.00,
        ]);

        $this->get(route('profesor.show', $profesor))
            ->assertOk()
            ->assertSee('Laura')
            ->assertSee('Martínez')
            ->assertSee('Matemáticas');
    }
}
