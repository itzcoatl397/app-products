
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Mis Marcas</h1>
    @if ($marcas->isEmpty())
        <p>No tienes marcas registradas.</p>
    @else
        <ul class="list-group">
            @foreach ($marcas as $marca)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <form class="w-100" method="POST" action="{{ route('marca.actualizar', ['id' => $marca->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <input type="text" class="form-control" name="nombre" value="{{ $marca->nombre }}">
                            <select class="form-control" name="proveedor">
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}" {{ $proveedor->id === $marca->proveedor_id ? 'selected' : '' }}>
                                        {{ $proveedor->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('marca.eliminar', ['id' => $marca->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ml-2">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
    <div class="container">

        <div class="container">
        <h1>Agregar Marca</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form  method="POST" action="{{ route('marca.guardar') }}">
            @csrf
            <div class="form-group">
                <label for="nombre_marca">Nombre de la Marca:</label>
                <input type="text" class="form-control" id="nombre_marca" name="nombre_marca" required>
            </div>


            <div class="form-group">
    <label for="proveedor">Proveedor:</label>
    <select class="form-control" id="proveedor" name="proveedor">
        @foreach ($proveedores as $proveedor)
            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
        @endforeach
    </select>
</div>
            <button type="submit" class="btn btn-primary">Agregar Marca</button>
        </form>
    </div>
@endsection
