<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CourseStatus extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    // Indicar o nome da tabela
    protected $table = 'course_statuses';

    // Indicar quais colunas podem ser manipuladas
    protected $fillable = ['name'];

    // Criar relacionamento entre um e muitos
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
