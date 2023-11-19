<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD PRODUCTOS</title>

        @vite(['resources/js/app.js'])

    </head>
      <body>
        @include('partials.navegacion')

{{-- Estatusverde --}}
    @if (session('status'))
        <div class="container mt-3" id="statusMessage">
        <div class="alert alert-success" role="alert">
        {{ session('status') }}
        </div>
        </div>
        <script>
            setTimeout(function() {
                var statusMessage = document.getElementById('statusMessage');
                    if (statusMessage) {statusMessage.classList.add('hidden');
                    setTimeout(function() {statusMessage.style.display = 'none';}, 500);}}, 3000);
        </script>
    @endif

    {{-- EstatusRojo --}}
    @if (session('statusR'))
        <div class="container mt-3" id="statusMessage">
        <div class="alert alert-danger" role="alert">
        {{ session('statusR') }}
        </div>
        </div>
        <script>
            setTimeout(function() {
                var statusMessage = document.getElementById('statusMessage');
                    if (statusMessage) {statusMessage.classList.add('hidden');
                    setTimeout(function() {statusMessage.style.display = 'none';}, 500);}}, 3000);
        </script>
    @endif

        {{-- EstatusAmarillo --}}
        @if (session('statusA'))
        <div class="container mt-3" id="statusMessage">
        <div class="alert alert-warning" role="alert">
        {{ session('statusA') }}
        </div>
        </div>
        <script>
            setTimeout(function() {
                var statusMessage = document.getElementById('statusMessage');
                    if (statusMessage) {statusMessage.classList.add('hidden');
                    setTimeout(function() {statusMessage.style.display = 'none';}, 500);}}, 3000);
        </script>
    @endif





        @yield('container')
        @yield('js')


    </body>

</html>
