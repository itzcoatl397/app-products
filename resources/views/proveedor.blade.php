@extends('layouts.app')
@section('content')


@section('content')
<div class="container mt-5">
    <h1>Mis Proveedores</h1>
    @if ($proveedores->isEmpty())
        <p>No tienes proveedores registrados.</p>
    @else
        <ul class="list-group">
            @foreach ($proveedores as $proveedor)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <form class="w-100" method="POST" action="{{ route('proveedores.actualizar', ['id' => $proveedor->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <input type="text" class="form-control" name="nombre" value="{{ $proveedor->nombre }}" >
                            <input type="text" class="form-control" name="direccion" value="{{ $proveedor->direccion }}" >
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('proveedores.eliminar', ['id' => $proveedor->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ml-2">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>

    <!-- Resto del contenido de la vista... -->


    <h1>Crear Proveedor</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="container mt-5">
        <form method="POST" action="{{ route('proveedores.guardar') }}" class="border p-4">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
