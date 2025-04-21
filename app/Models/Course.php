<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Course extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    //Indicar o nome da tabela no banco de dados. 
    protected $table = 'courses';

    //Indicar quais colunas podem ser manipuladas. 
    protected $fillable = ['name'];
}
