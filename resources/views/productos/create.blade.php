@extends('layouts.app')

@section('container')
    <h1 class="text-center">Nuevo Producto</h1>

    <div class="container mt-4 w-75">
        <form action="{{route('ProductosStore')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="nombre" class="form-label mt-2">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control mt-2"
                value="{{old('nombre')}}">

                @error('nombre')
                    <div style="color: red">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion" class="form-label mt-2">Descripcion:</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control mt-2" value="{{old('descripcion')}}">

                @error('descripcion')
                <div style="color: red">
                    {{$message}}
                </div>
            @enderror
            </div>

            <div class="form-group">
                <label for="precio" class="form-label mt-2">Precio:</label>
                <input type="text" name="precio" id="precio" class="form-control mt-2" value="{{old('precio')}}">

                @error('precio')
                <div style="color: red">
                    {{$message}}
                </div>
            @enderror
            </div>

            <div class="form-group">
                <label for="categoria" class="form-label mt-2">Categoria:</label>
                <select name="categoria" class="form-select">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>

                @error('categoria')
                <div style="color: red">
                    {{$message}}
                </div>
            @enderror
            </div>

            <div class="form-group mt-4 d-flex justify-content-center">
                <button type="submit" class="btn btn-success mx-2">Guardar</button>
                <a href="{{route('ProductosIndex')}}" class="btn btn-danger">Cancelar</a>
            </div>

        </form>


    </div>

@endsection
