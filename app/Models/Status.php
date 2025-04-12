<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //Indicar o nome da tabela no banco de dados. 
    protected $table = 'statuses';
    //Indicar quais colunas podem ser manipuladas. 
    protected $fillable = ['name'];
}
