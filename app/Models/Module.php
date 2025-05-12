<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Module extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    //Indicar o nome da tabela no banco de dados. 
    protected $table = 'modules';

    //Indicar quais colunas podem ser manipuladas. 
    protected $fillable = ['name'];

    // Criar relacionamento entre um e muitos
    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    // Criar relacionamento entre um e muitos inverso
    public function courseBatch()
    {
        return $this->belongsTo(CourseBatch::class);
    }
}
