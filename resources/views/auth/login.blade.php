@extends('layouts.app_principal')

@section('container')

<h1 class="text-center">Login</h1>

<div class="container mt-4 w-75">
    <form action="{{route('LoginStore')}}" method="post">
        @csrf

        <div class="form-group">

        @if (session('mensaje'))
            <div style="color:red">{{session('mensaje')}}</div>
        @endif


            <label for="username" class="form-label mt-2">Usuario:</label>
            <input type="text" name="username" id="username" class="form-control mt-2" value="{{old('username')}}" placeholder="Escribe tu usuario ...">

        @error('username')
            <div style="color: red">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label mt-2">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Escribe tu contraseña ...">

            @error('password_confirmation')
            <div style="color: red">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group mt-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mx-2">Iniciar Sesion</button>
            <a href="{{route('Dashboard')}}" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>

@endsection
