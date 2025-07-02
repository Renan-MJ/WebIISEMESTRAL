<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dentista extends Model
{
    protected $fillable = ['nome', 'email', 'telefone'];

    // Um dentista pode ter várias consultas
    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}