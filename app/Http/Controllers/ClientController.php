<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*  Esta línea utiliza el modelo Client y la función paginate() para obtener los registros de
       clientes de la base de datos y paginarlos en grupos de 3 elementos por página.
       La función paginate() es una función integrada en Laravel que facilita la paginación de
       los registros de la base de datos con una configuración mínima */

        $clients = Client::paginate(3);

        /*  La función with() se utiliza para pasar datos a la vista.En este caso, se pasa la variable $clients
        (que contiene los registros de clientes paginados) a la vista client.index. La vista puede utilizar
        esta variable para mostrar la información de los clientes y la paginación correspondiente.  */

        /* El primer parametro puede ser cualquier nombre */
        return view('client.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Aqui retornamos la vista que esta en app/views/client/form.blade.php
        return view('client.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*  La primera línea utiliza el método validate() del objeto $request para validar los datos de
        entrada del formulario. En este caso, se validan los campos "name" y "due" para asegurarse
        de que se proporcionen y cumplan con ciertas reglas de validación. Si la validación falla,
        Laravel automáticamente redirige al usuario a la página anterior con los errores de validación. */
        $request->validate([
            'name' => 'required | max:15',
            /* La parte gte significa "greater than or equal to" (mayor o igual que) y se utiliza junto con un
            valor numérico, en este caso, 1. Esto indica que el valor del campo de entrada debe ser mayor o
            igual a 1 */
            'due'   => 'required | gte:1'

        ]);
        /* La segunda línea crea un nuevo registro en la base de datos utilizando el modelo Client y el método
        create(). El método only() se utiliza para obtener solo los campos necesarios del objeto $request y evitar
        la asignación masiva de datos. */
        $client = Client::create($request->only('name', 'due', 'comments'));
        /* La función flash() en Laravel se utiliza para mostrar un mensaje de sesión al usuario después de una
        acción específica. En el código proporcionado, la función Session::flash() se utiliza para mostrar un
        mensaje de éxito al usuario después de crear un nuevo registro en la base de datos. Este mensaje se
        mostrará en la próxima solicitud HTTP y luego se eliminará automáticamente. */
        Session::flash('mensaje', 'Registro creado con éxito!');
        /*  La última línea utiliza el método redirect() para redirigir al usuario a la página de índice de clientes
        utilizando la ruta con nombre "client.index". */
        return  redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        /*  El método se llama "edit" y toma un objeto "Client" como parámetro. Este método devuelve
        una vista llamada "client.form" y pasa el objeto "Client" a la vista utilizando el método
        "with" */
        return view('client.form')->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        // Validar los datos de la solicitud
        $request->validate([
            'name' => 'required | max:15',
            'due'   => 'required | gte:1'
        ]);

        // Actualizar los campos del modelo con los datos de la solicitud
        $client->name = $request['name'];
        $client->due = $request['due'];
        $client->comments = $request['comments'];

        // Guardar los cambios en la base de datos
        $client->save();

        // Mostrar un mensaje de éxito
        Session::flash('mensaje', 'Registro editado con éxito!');

        // Redirigir al usuario a la lista de clientes
        return redirect()->route('client.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        // Mostrar un mensaje de éxito
        Session::flash('mensaje', 'Registro Eliminado con éxito!');

        // Redirigir al usuario a la lista de clientes
        return redirect()->route('client.index');
    }
}
