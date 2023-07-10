<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    /* En Laravel, el atributo $fillable se utiliza en los modelos Eloquent para especificar
    qué atributos o columnas de la base de datos se pueden asignar de forma masiva a través
    de métodos como create() o fill().
    Cuando se crea una instancia de un modelo y se intenta asignar valores a los atributos,
    Laravel verifica si esos atributos están presentes en el arreglo $fillable. Si un atributo
    está en $fillable, se permite la asignación masiva y los datos se guardan en la base de datos.

    Si un atributo no está en $fillable, se considera una asignación en masa no permitida y los
    datos no se guardarán en la base de datos.

    Esta característica es una medida de seguridad para evitar que datos no deseados o maliciosos
    se asignen a través de formularios o cargas de datos. Al especificar explícitamente los atributos
    permitidos en el arreglo $fillable, se controla qué campos pueden ser asignados masivamente
     y se evita la asignación accidental o maliciosa de otros campos no deseados.
    */
    protected $fillable = ['name', 'due', 'comments'];
}
