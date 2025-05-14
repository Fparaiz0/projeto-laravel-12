<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Course extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    // Indicar o nome da tabela
    protected $table = 'courses';

    // Indicar quais colunas podem ser manipuladas
    protected $fillable = ['name'];

    // Criar relacionamento entre um e muitos inverso
    public function courseStatus()
    {
        return $this->belongsTo(CourseStatus::class);
    }

    // Criar relacionamento entre um e muitos
    public function courseBatch()
    {
        return $this->hasMany(CourseBatch::class);
    }
}
