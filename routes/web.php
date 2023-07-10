<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* En Laravel, Route::resource es una forma de declarar rutas para un controlador que proporciona las
rutas básicas para un recurso RESTful. En lugar de declarar rutas individuales para cada acción del
controlador, Route::resource crea automáticamente las rutas necesarias para las operaciones
CRUD (Create, Read, Update, Delete) en el controlador. Esto significa que con una sola línea de código,
se pueden definir todas las rutas necesarias para un recurso, lo que hace que el código sea más limpio
y fácil de mantener. Además, se pueden personalizar las rutas generadas por Route::resource para
adaptarlas a las necesidades específicas de la aplicación. */

//Si presionamos enter+espacio y luego enter al final de ClientController nos pondra la ruta completa
Route::resource('client',  ClientController::class);
/*
comando: php artisan route:list
Esta creando la ruta completa para cada accion en una sola linea
  GET|HEAD        / ........................................................................
  GET|HEAD        api/user .................................................................

  A partir de aqui

  GET|HEAD        client .............................. client.index › ClientController@index(Raiz de la ruta)
  GET|HEAD        client/create ..................... client.create › ClientController@create
  POST            client .............................. client.store › ClientController@store
  GET|HEAD        client/{client} ....................... client.show › ClientController@show
  PUT|PATCH       client/{client} ................... client.update › ClientController@update
  DELETE          client/{client} ................. client.destroy › ClientController@destroy
  GET|HEAD        client/{client}/edit .................. client.edit › ClientController@edit
  GET|HEAD        sanctum/csrf-cookie sanctum.csrf-cookie › Laravel\Sanctum › CsrfCookieCont… */
