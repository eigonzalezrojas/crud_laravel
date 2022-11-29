<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carreras;

class CarrerasController extends Controller
{

    public function index()
    {
        //esta instrucción equivale un select * from carreras
        $carreras = Carreras::all();
        return view('carreras', compact('carreras'));
    }


    public function create()
    {
        //
    }

    //Esta función es la encargada de guardar en la base de datos
    public function store(Request $request)
    {
        $carrera = new Carreras($request->input());
        $carrera->saveOrFail();
        return redirect('carreras');
    }


    public function show($id)
    {
        //select * from carreras where id=$id
        $carrera = Carreras::find($id);
        //creamos una nueva vista para editar carrera
        return view('editCarrera', compact('carrera'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $carrera = Carreras::find($id);
        $carrera->fill($request->input())->saveOrFail();
        return redirect('carreras');
    }


    public function destroy($id)
    {
        $carrera = Carreras::find($id);
        $carrera->delete();
        return redirect('carreras');
    }
}
