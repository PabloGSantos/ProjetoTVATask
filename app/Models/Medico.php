<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';
    protected $fillable = [
        'medico_name',
        'medico_email',
        'medico_gender',
        'medico_image',
        'id_especialidade'
    ];
    public function relEspecialidades()
    {
        return $this->hasOne(
            'App\Models\Especialidade',
            'id',
            'id_especialidade'
        );
    }

}
