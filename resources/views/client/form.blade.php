@extends('theme.base'){{-- Esto es carpeta.archivo --}}

@section('name')
    <div class="container  py-5 text-center">

        {{-- Si la variable $client está definida, se muestra el mensaje "Editar cliente" en un
        encabezado de nivel 1 (<h1>), de lo contrario se muestra el mensaje "Crear Cliente".
        Luego, se utiliza otra estructura condicional para determinar si la variable $client
        está definida. Si la variable $client está definida, se crea un formulario que envía
        una solicitud HTTP POST a una ruta específica utilizando el método PUT. De lo contrario,
        se crea un formulario que envía una solicitud HTTP POST a otra ruta específica utilizando
        el método POST. --}}
        @if (isset($client))
            <h1>Editar cliente</h1>
        @else
            <h1>Crear Cliente</h1>
        @endif

        @if (isset($client))
            <form action="  {{ route('client.update', $client) }}" method="POST">
                @method('PUT')
            @else
                <form action="  {{ route('client.store') }}" method="POST">
        @endif


        <form action="  {{ route('client.store') }}" method="POST">

            {{-- La directiva @csrf en Blade de Laravel se utiliza para agregar un campo de token
        CSRF (Cross-Site Request Forgery "falsificacion de solicitud de sitio cruzado") en un formulario HTML.
        CSRF es un tipo de ataque malicioso en el que un tercero intenta realizar peticiones en nombre de un
        usuario autenticado sin su consentimiento. --}}
            @csrf

            <div>
                {{-- La función old('') en Laravel se utiliza para mostrar los valores antiguos de un formulario después
                de que se ha enviado y validado. Si el formulario no pasa la validación, los valores antiguos se
                muestran en los campos de entrada para que el usuario no tenga que volver a escribirlos.
                Si el campo no tiene un valor antiguo, se utiliza el valor predeterminado que se encuentra después del
                operador de fusión de null ??.Y el @ se coloca para que no nos de un error en el caso que no haya ninguna
                de las dos variables.
                --}}

                <label for="name" class="form-label">Nombre</label>

                <input type="text" name="name" class="form-control" placeholder="Nombre"
                    value="{{ old('name') ?? @$client->name }}">

                <p class="form-text">Escriba el nombre del cliente</p>
                {{-- Muestra el mensaje de error de la funcion store en ClientController --}}
                @error('name')
                    <p class="form-text text-danger"> {{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="due" class="form-label">Saldo</label>

                {{-- La propiedad step nos permite ingresar numeros decimales --}}
                <input type="number" name="due" class="form-control" placeholder="Saldo del Cliente" step="0.01"
                    value="{{ old('due') ?? @$client->due }} }}">

                <p class="form-text">Escriba el saldo del cliente</p>
                {{-- Muestra el mensaje de error de la funcion store en ClientController --}}
                @error('due')
                    <p class="form-text text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="comments" class="form-label">Comentarios</label>

                <textarea name="comments" cols="30" rows="4" class="form-control"> {{ old('comments') ?? @$client->comments }}</textarea>
                <p class="form-text">Escriba algun comentario</p>

            </div>
            {{--  Comprueba si la variable $client está definida. Si es así, se muestra un botón con el texto "Editar Cliente".
            Si no está definida, se muestra un botón con el texto "Guardar Cliente" --}}
            @if (isset($client))
                <button type="submit" class="btn btn-info">Editar Cliente</button>
            @else
                <button type="submit" class="btn btn-info">Guardar Cliente</button>
            @endif


        </form>
    @endsection
