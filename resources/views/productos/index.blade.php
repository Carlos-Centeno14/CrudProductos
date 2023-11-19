@extends('layouts.app')

@section('container')
    <h1 class="text-center">Productos</h1>

    <div class="container mt-4">

        <form action="{{route('ProductosCreate')}}" method="get">
            <button class="btn btn-success mb-2" type="submit"><span class="p-4">Nuevo</span></button>
        </form>


        <table class="table table-responsive table-striped">
            <tr class="table-dark">
                <td>ID</td>
                <td>NOMBRE</td>
                <td>DESCRIPCION</td>
                <td>PRECIO</td>
                <td>CATEGORIA</td>
                <td>ACCIONES</td>
            </tr>
            @foreach ($productos as $prd)
                <tr>
                    <td>{{$prd->id}}</td>
                    <td>{{$prd->nombre}}</td>
                    <td>{{$prd->descripcion}}</td>
                    <td>{{$prd->precio}}</td>
                    <td>{{$prd->categoria->nombre}}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-warning mx-1" href="{{route('ProductosEdit',$prd->id)}}">Editar</a>

                            <form class="formulario-eliminar" action="{{route('ProductosDestroy',$prd->id)}}" method="post">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger mx-1">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach


        </table>
        {{$productos->links('pagination::bootstrap-5')}}
    </div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
 const formularios = document.querySelectorAll('.formulario-eliminar');

 formularios.forEach(formulario => {
 formulario.addEventListener('submit', function(e) {
 e.preventDefault();

 Swal.fire({
 title: '¿Estás seguro?',
 text: '¡Esta acción no es reversible!',
 icon: 'warning',
 showCancelButton: true,
 confirmButtonColor: 'green',
 cancelButtonColor: '#d33',
 confirmButtonText: 'Sí, eliminar',
 cancelButtonText: 'Cancelar'
 }).then((result) => {
 if (result.isConfirmed) {
 this.submit();
 }
 });
 });
 });
 });
</script>
@endsection
