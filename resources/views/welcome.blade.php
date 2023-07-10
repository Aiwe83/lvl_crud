{{-- @extends en Laravel se utiliza para extender una plantilla base en una vista. Esto significa
que puedes crear una plantilla base que contenga elementos comunes a varias vistas, como la
barra de navegación o el pie de página, y luego extender esa plantilla en vistas específicas. --}}

@extends('theme.base'){{-- Esto es carpeta.archivo --}}

{{-- @section en Laravel se utiliza para definir una sección en una vista que se extiende de una plantilla
base utilizando la directiva @extends. Al definir una sección con @section, puedes agregar contenido
específico a esa sección en la vista, que se mostrará en la plantilla base cuando se extienda. --}}
@section('name')
    {{-- py-5 es una clase de Bootstrap que se utiliza para agregar un relleno o padding vertical de 5
        píxeles a un elemento HTML. --}}
    <div class="container  py-5 text-center">
        <h1>Hola mundo</h1>
        {{-- se agrega la ruta para mostrar la vista y un boton azul Clientes --}}
        <a href="{{ route('client.index') }}" class="btn btn-primary">Clientes</a>
    </div>
@endsection
