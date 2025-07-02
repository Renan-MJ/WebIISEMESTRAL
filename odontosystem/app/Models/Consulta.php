<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = ['data', 'hora', 'status', 'paciente_id', 'dentista_id'];

    // Consulta pertence a um paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    // Consulta pertence a um dentista
    public function dentista()
    {
        return $this->belongsTo(Dentista::class);
    }
}