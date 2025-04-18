<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //Indicar o nome da tabela no banco de dados. 
    protected $table = 'modules';

    //Indicar quais colunas podem ser manipuladas. 
    protected $fillable = ['name'];
}
