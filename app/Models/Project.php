<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //Indicar o nome da tabela  
    protected $table = 'project';

    //Indicar quais campos podem ser manipulados 
    protected $fillable = ['name'];
}
