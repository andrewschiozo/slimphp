<?php

namespace src\Agendamento\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agenda_reuniao';
    protected  $primaryKey = 'id';

    protected $fillable = ['data_hora', 'sala', 'organizador', 'setor', 'observacoes'];
}