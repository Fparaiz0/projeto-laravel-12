<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UserStatus extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    //Indicar o nome da tabela no banco de dados. 
    protected $table = 'user_statuses';
    //Indicar quais colunas podem ser manipuladas. 
    protected $fillable = ['name'];
}
