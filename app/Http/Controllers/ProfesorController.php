<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfesorController extends Controller
{
    private const RULES = [
        'nombre' => 'required|string|max:100|min:2',
        'apellidos' => 'required|string|max:130|min:2',
        'especialidad' => 'required|string|max:100|min:2',
        'fecha_alta' => 'nullable|date',
        'salario' => 'nullable|numeric|gte:0|decimal:0,2',
    ];

    private const MESSAGES = [
        'nombre.required' => 'Nombre requerido',
        'nombre.string' => 'Nombre debe ser texto',
        'nombre.max' => 'Nombre max 100 caracteres',
        'nombre.min' => 'Nombre min 2 caracteres',
        'apellidos.required' => 'Apellidos requeridos',
        'apellidos.string' => 'Apellidos debe ser texto',
        'apellidos.max' => 'Apellidos max 130 caracteres',
        'apellidos.min' => 'Apellidos min 2 caracteres',
        'especialidad.required' => 'Especialidad requerida',
        'especialidad.string' => 'Especialidad debe ser texto',
        'especialidad.max' => 'Especialidad max 100 caracteres',
        'especialidad.min' => 'Especialidad min 2 caracteres',
        'fecha_alta.date' => 'Fecha de alta inválida',
        'salario.numeric' => 'Salario debe ser número',
        'salario.gte' => 'Salario mínimo 0',
        'salario.decimal' => 'Salario con hasta 2 decimales',
    ];

    public function create(): View
    {
        return view('profesor.create', []);
    }

    public function destroy(Profesor $profesor): RedirectResponse
    {
        try {
            $profesor->delete();
        } catch (QueryException $e) {
            if ($e->getCode() == 23503) {
                return back()->withInput()->withErrors([
                    'error' => 'Error al eliminar el profesor. Posiblemente esté asociado a otro registro.',
                ]);
            } else {
                return back()->withInput()->withErrors([
                    'error' => 'Error al eliminar el profesor. '.$e->getMessage(),
                ]);
            }
        } catch (\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al eliminar el profesor. '.$e->getMessage(),
            ]);
        }

        return redirect()->route('profesor.index')->with(['success' => 'Profesor eliminado correctamente']);
    }

    public function edit(Profesor $profesor): View
    {
        return view('profesor.edit', ['profesor' => $profesor]);
    }

    public function index(): View
    {
        return view('profesor.index', ['profesores' => Profesor::all()]);
    }

    public function show(Profesor $profesor): View
    {
        return view('profesor.show', ['profesor' => $profesor]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        if (!isset($data['apellidos']) && isset($data['apellido'])) {
            $data['apellidos'] = $data['apellido'];
        }
        if (!isset($data['fecha_alta']) && isset($data['fecha_de_alta'])) {
            $data['fecha_alta'] = $data['fecha_de_alta'];
        }

        $validator = Validator::make($data, self::RULES, self::MESSAGES);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $profesor = new Profesor($data);
        try {
            $profesor->save();
        } catch (UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Nombre y apellidos ya existentes.',
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al guardar el profesor. '.$e->getMessage(),
            ]);
        }

        session(['success' => 'Profesor creado correctamente']);

        return redirect()->route('profesor.create')->with(['success' => 'Profesor creado correctamente']);
    }

    public function update(Request $request, Profesor $profesor): RedirectResponse
    {
        $data = $request->all();
        if (!isset($data['apellidos']) && isset($data['apellido'])) {
            $data['apellidos'] = $data['apellido'];
        }
        if (!isset($data['fecha_alta']) && isset($data['fecha_de_alta'])) {
            $data['fecha_alta'] = $data['fecha_de_alta'];
        }

        $validator = Validator::make($data, self::RULES, self::MESSAGES);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {
            $profesor->update($data);
        } catch (UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Nombre y apellidos ya existentes. Error de clave única duplicada',
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al actualizar el profesor. '.$e->getMessage(),
            ]);
        }

        return redirect()->route('profesor.edit', ['profesor' => $profesor])->with(['success' => 'Profesor modificado correctamente']);
    }
}
