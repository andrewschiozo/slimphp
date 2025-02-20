<?php

namespace src\Agendamento\Models;

use Illuminate\Database\Eloquent\Model;
use src\Sala\Models\Sala;

class Agendamento extends Model
{
    protected $table = 'agenda_reuniao';
    protected  $primaryKey = 'id';

    protected $fillable = ['data_hora', 'sala_id', 'organizador', 'setor', 'observacoes'];
    protected $hidden = ['created_at', 'updated_at'];

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id');
    }
}