@extends('plantilla')
@section('contenido')
<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white ">Editar Alumno</div>
            <div class="card-body">
                <form id="frmalumnos" method="POST" action="{{ url("alumnos",[$alumno] )}}">
                    @csrf
                    @method('PUT')                    
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input type="text" name="nombre" value="{{ $alumno->nombre }}" class="form-control" maxlength="50" placeholder="carrera" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input type="email" name="correo" value="{{ $alumno->correo }}" class="form-control" maxlength="50" placeholder="carrera" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <select name="id_carrera" id="id_carrera" class="form-select" required>
                            <option value="">Carrera</option>
                            @foreach($carreras as $row)
                                @if ($row->id == $alumno->id_carrera)
                                    <option selected value="{{ $row->id }}">{{ $row->carrera }}</option>                                    
                                @else
                                    <option value="{{ $row->id }}">{{ $row->carrera }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection