<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CourseBatch extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    //Indicar o nome da tabela no banco de dados. 
    protected $table = 'course_batches';

    //Indicar quais colunas podem ser manipuladas. 
    protected $fillable = ['name'];

    //Criar relacionamento entre um e muitos
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
