@extends('theme.base'){{-- Esto es carpeta.archivo --}}

@section('name')
    <div class="container  py-5 text-center">
        <h1>Listado de clientes</h1>
        {{--  Se agrega la ruta hacia ClientController para retornar la vista  --}}
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Clientes</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        @if ($clients->isEmpty())
            <div class="alert alert-warning my-5">
                <p>No hay registros.</p>
            </div>
        @else
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    {{-- La variable $clients contiene todos los clientes y $client puede ser cualquier nombre --}}
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->due }}</td>

                            <td>
                                {{-- El botón de edición redirige a la ruta 'client.edit' con el id del cliente como parámetro,
                                mientras que el botón de eliminación envía un formulario con el método HTTP DELETE a la ruta
                                'client.destroy' con el id del cliente como parámetro. --}}

                                <a href="{{ route('client.edit', $client) }}" class="btn btn-warning">Editar</a>

                                <form action="  {{ route('client.destroy', $client) }}" method="POST" class="d-inline">
                                    <!-- Agrega un campo oculto al formulario con el método HTTP DELETE -->
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('¿Desea eliminar este cliente?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{--  La línea de código {{ $clients->links() }} en Laravel se utiliza para generar enlaces de paginación
        para una colección de datos. El método links() genera un conjunto de enlaces para navegar entre las
        páginas de la colección. --}}

            {{--  La clase d-flex se utiliza para convertir el contenedor en un contenedor flexible, mientras que
        la clase justify-content-center se utiliza para centrar el contenido horizontalmente dentro del
        contenedor --}}

            <div>
                {{-- Aqui se mostrara la paginacion --}}
                {{-- Tambien se puede colocar count --}}

                @if ($clients->hasPages())
                    {{ $clients->links() }}
                @endif
            </div>
        @endif
    </div>
@endsection
