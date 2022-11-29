<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use App\Models\Carreras;

class AlumnosController extends Controller
{
    public function index()
    {
        //esta instrucción equivale un select * from carreras
        $alumnos = Alumnos::select('alumnos.id', 'nombre', 'correo', 'id_carrera', 'carrera')
        ->join('carreras', 'carreras.id','=','alumnos.id_carrera')->get();
        $carreras = Carreras::all();
        return view('alumnos', compact('alumnos', 'carreras'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $alumnos = new Alumnos($request->input());
        $alumnos->saveOrFail();
        return redirect('alumnos');
    }

    public function show($id)
    {
        //select * from alumnos where id=$id
        $alumno = Alumnos::find($id);
        //select * from carreras 
        $carreras = Carreras::all();
        return view('editAlumno', compact('alumno', 'carreras'));
    }

    public function edit(Request $request, $id)
    {
        $alumno = Alumnos::find($id);
        $alumno->fill($request->input())->saveOrFail();
        return redirect('alumnos');
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumnos::find($id);
        $alumno->fill($request->input())->saveOrFail();
        return redirect('alumnos');
    }

    public function destroy($id)
    {
        $alumno = Alumnos::find($id);
        $alumno->delete();
        return redirect('alumnos');
    }
}
