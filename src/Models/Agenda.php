<?php

namespace src\models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda_reuniao';
    protected  $primaryKey = 'id';

    protected $fillable = ['data_hora', 'sala', 'organizador', 'setor', 'observacoes'];
}