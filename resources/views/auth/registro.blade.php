@extends('layouts.app_principal')

@section('container')

<h1 class="text-center">Registro</h1>

<div class="container mt-4 w-75">
    <form action="{{route('RegistroStore')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label mt-2">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control mt-2"
            value="{{old('name')}}" placeholder="Escribe tu nombre ...">

            @error('name')
                <div style="color: red">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="username" class="form-label mt-2">Usuario:</label>
            <input type="text" name="username" id="username" class="form-control mt-2" value="{{old('username')}}" placeholder="Escribe tu usuario ...">

            @error('username')
            <div style="color: red">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label mt-2">Contrseña:</label>
            <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Escribe tu contraseña ...">
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label mt-2">Contrseña:</label>
            <input type="password_confirmation" name="password_confirmation" id="password_confirmation" class="form-control mt-2" placeholder="Repite tu contraseña ...">

            @error('password_confirmation')
            <div style="color: red">
                {{$message}}
            </div>
        @enderror
        </div>






        <div class="form-group">
            <label for="email" class="form-label mt-2">Correo Electronico:</label>
            <input type="email" name="email" id="email" class="form-control mt-2" value="{{old('email')}}" placeholder="Escribe tu correo electronico ...">

            @error('email')
            <div style="color: red">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="form-group mt-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mx-2">Crear usuario</button>
            <a href="{{route('Dashboard')}}" class="btn btn-info">Cancelar</a>
        </div>

    </form>


</div>

@endsection
