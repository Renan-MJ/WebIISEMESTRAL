<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['nome', 'email', 'telefone'];

    // Um paciente pode ter várias consultas
    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}