<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseBatch extends Model
{
    //Indicar o nome da tabela no banco de dados. 
    protected $table = 'coursebatches';

    //Indicar quais colunas podem ser manipuladas. 
    protected $fillable = ['name'];
}
