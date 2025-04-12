<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseStatus extends Model
{
    //Indicar o nome da tabela no banco de dados. 
    protected $table = 'course_statuses';
    //Indicar quais colunas podem ser manipuladas. 
    protected $fillable = ['name'];
}
