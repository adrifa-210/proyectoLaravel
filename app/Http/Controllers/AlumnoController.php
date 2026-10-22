<?php

namespace App\Http\Controllers;
use Illuminate\Database\UniqueConstraintViolationException;
use App\Models\Alumno;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AlumnoController extends Controller
{
    private const RULES = [
            'nombre' => 'required|string|max:100|min:2',
            'apellido' => 'required|string|max:130|min:2',
            'fnac' => 'nullable|date|before_or_equal:today',
            'genero' => 'nullable|in:masculino,femenino,otro',
            'notaacceso'=> 'nullable|numeric|gte:0|lte:10|decimal:0,2',
        ];
    
    private const MESSAGES = [
            'nombre.required' => 'Nombre requerido',
            'nombre.string' => 'Nombre debe ser texto',
            'nombre.max' => 'Nombre max 100 caracteres',
            'nombre.min' => 'Nombre min 2 caracteres',
            'apellido.required' => 'Apellido requerido',
            'apellido.string' => 'Apellido debe ser texto',
            'apellido.max' => 'Apellido max 130 caracteres',
            'apellido.min' => 'Apellido min 100 caracteres',
            'fnac.date' => 'Fecha invalida',
            'fnac.before_or_equal' => 'Fecha mayor a hoy',
            'genero.in' => 'Generos permitidos masculino, femenino u otro',
            'notaacceso.numeric' => 'Nota acceso debe ser numero',
            'notaacceso.gte' => 'Nota acceso minimo 0',
            'notaacceso.lte' => 'Nota acceso maximo 10',
            'notaacceso.decimal' => 'Nota acceso con 2 decimales',
        ];

    public function create(): View
    {
        //
        return view('alumno.create', []);
    }

    public function destroy(Alumno $alumno): RedirectResponse
    {
        try{
        $alumno->delete();
        } catch(QueryException $e) {
            if ($e->getCode() == 23503){
                return back()->withInput()->withErrors([
                    'error' => 'Error al eliminar el alumno. Posiblemente este asociado a otro registro.',
                ]);
            } else {
                return back()->withInput()->withErrors([
                    'error' => 'Error al eliminar el alumno. '.$e->getMessage(),
                ]);
            }

        } catch(\Exception $e){
            echo 'global';
            dd($e);
        }
        return redirect()->route('alumno.index')->with(['success' => 'Alumno eliminado correctamente']);
    }

    public function edit(Alumno $alumno): View
    {
        //
        return view('alumno.edit', ['alumno'=>$alumno]);
    }


    public function index(): View
    {
        return view('alumno.index', ['alumnos' => Alumno::all()]);
    }

    public function show(Alumno $alumno): View
    {
        //
        return view('alumno.show', ['alumno'=>$alumno]);
    }

    function store(Request $request): RedirectResponse{
        //1º Validar
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);

        if($validator->fails()){
             return back()->withInput()->withErrors($validator);
        }

        $alumno = new Alumno($request->all());
        try{
            $alumno->save();
        } catch(UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Nombre y apellidos ya existentes.',
                //'nombre' => 'Este campo forma parte de la clave unica',
                //'apellido' => 'Este campo forma parte de la clave unica'
            ]);
        } catch(\Exception $e){
            echo 'global';
            dd($e);
        }

        session(['success' => 'Alumno creado correctamente']);
        
        return redirect()->route('alumno.create')->with(['success' => 'Alumno creado correctamente']);
    }

    /*
    function store(Request $request) RedirectResponse{
        //dd($request->all());
        //protected $fillable = ['nombre', 'apellidos', 'fnac', 'genero', 'nacceso'];
        $alumno = new Alumno($request->all());
        /*$alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->genero = $request->genero;
        $alumno->fnac = $request->fnac;
        $alumno->nacceso = $request->nacceso;
        $alumno->save();
        //dd($alumno);
        echo 'parece que todo ha ido bien.';
    }
    */

    public function update(Request $request, Alumno $alumno): RedirectResponse
    {
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);

        if($validator->fails()){
             return back()->withInput()->withErrors($validator);
        }

        try{
            $alumno -> update($request->all());
        } catch(UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Nombre y apellidos ya existentes. Error de clave unica duplicada',
            ]);
        } catch(\Exception $e){
            echo 'global';
            dd($e);
        }

        return redirect()->route('alumno.edit', ['alumno' => $alumno])->with(['success' => 'Alumno modificado correctamente']);
    }
}
