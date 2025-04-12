<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //Indicar o nome da tabela no banco de dados. 
    protected $table = 'lessons';
    //Indicar quais colunas podem ser manipuladas. 
    protected $fillable = ['name'];
}
