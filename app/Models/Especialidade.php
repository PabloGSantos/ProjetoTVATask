<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;
    protected $fillable = [
        'especialidade_name'
    ];

    public function relMedicos()
    {
        return $this->hasMany(
            'App\Models\Medico',
            'id_especialidade'
        );
    }
}
