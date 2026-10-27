<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\View\View;

class ModuloController extends Controller
{
    private const RULES = [
        'nombre' => 'required|string|max:120|min:3|unique:modulo,nombre',
        'abreviatura' => 'required|string|max:7|min:3|unique:modulo,abreviatura',
        'horas' => 'nullable|integer|gte:0|lte:15',
        'creditos' => 'nullable|numeric|gte:0|lte:99.99|decimal:0,2',
    ];
    private const MESSAGES = [
        'nombre.required' => 'Nombre requerido',
        'nombre.string' => 'Nombre debe ser texto',
        'nombre.max' => 'Nombre max 120 caracteres',
        'nombre.min' => 'Nombre min 3 caracteres',
        'abreviatura.required' => 'Abreviatura requerida',
        'abreviatura.string' => 'Abreviatura debe ser texto',
        'abreviatura.max' => 'Abreviatura max 7 caracteres',
        'abreviatura.min' => 'Abreviatura min 3 caracteres',
        'horas.integer' => 'Horas debe ser numero entero',
        'horas.gte' => 'Horas minimo 0',
        'horas.lte' => 'Horas maximo 15',
        'creditos.numeric' => 'Creditos debe ser numero',
        'creditos.gte' => 'Creditos minimo 0',
        'creditos.lte' => 'Creditos maximo 99.99',
        'creditos.decimal' => 'Creditos con 2 decimales',
    ];
    // index
    public function index(): View {
        $modulos = Modulo::orderBy('nombre')->get();
        return view('modulo.index', ['modulos' => $modulos]);
    }
    public function create(): View {
        return view('modulo.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //1º Validar
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $modulo = new Modulo($request->all());
        try {
            $modulo->save();
        } catch (UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Nombre o abreviatura ya existentes.',
            ]);
        } catch (\Exception $e) {
            echo 'global';
            dd($e);
        }

        session(['success' => 'Modulo creado correctamente']);

        return redirect()->route('modulo.create')->with(['success' => 'Modulo creado correctamente']);
    }

    public function show(Modulo $modulo): View|RedirectResponse1
    {
        if ($modulo == null) {
            return redirect()->route('modulo.index')->with(['error' => '404 - Modulo no encontrado']);
        }
        return view('modulo.show', ['modulo' => $modulo]);
    }

    public function edit(Modulo $modulo): View
    {
        return view('modulo.edit', ['modulo' => $modulo]);
    }

    public function update(Request $request, Modulo $modulo): RedirectResponse
    {
        $rules = self::RULES;
        $rules['nombre'] = 'required|string|max:120|min:3|unique:modulo,nombre,' . $modulo->id;
        $rules['abreviatura'] = 'required|string|max:7|min:3|unique:modulo,abreviatura,' . $modulo->id;

        $validator = Validator::make($request->all(), $rules, self::MESSAGES);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        try {
            $modulo->update($request->all());
        } catch (UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Nombre o abreviatura ya existentes.',
            ]);
        } catch (\Exception $e) {
            echo 'global';
            dd($e);
        }
        session(['success' => 'Modulo modificado correctamente']);

        return redirect()->route('modulo.edit', ['modulo' => $modulo])->with(['success' => 'Modulo modificado correctamente']);
    }

    public function destroy(Modulo $modulo): RedirectResponse
    {
        try {
            $modulo->delete();
        } catch (QueryException $e) {
            if ($e->getCode() == 23503) {
                return back()->withInput()->withErrors([
                    'error' => 'Error al eliminar el modulo. Posiblemente esté asociado a otro registro.',
                ]);
            } else {
                return back()->withInput()->withErrors([
                    'error' => 'Error al eliminar el modulo. '.$e->getMessage(),
                ]);
            }
        } catch (\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al eliminar el modulo. '.$e->getMessage(),
            ]);
        }
        session(['success' => 'Modulo eliminado correctamente']);
        return redirect()->route('modulo.index')->with(['success' => 'Modulo eliminado correctamente']);
    }
}
