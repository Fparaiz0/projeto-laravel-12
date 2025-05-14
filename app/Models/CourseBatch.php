<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CourseBatch extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    // Indicar o nome da tabela
    protected $table = 'course_batches';

    // Indicar quais colunas podem ser manipuladas
    protected $fillable = ['name', 'course_id'];

    // Criar relacionamento entre um e muitos
    public function module()
    {
        return $this->hasMany(Module::class);
    }

    // Criar relacionamento entre um e muitos inverso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
