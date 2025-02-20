<?php

namespace src\Sala\Models;

use Illuminate\Database\Eloquent\Model;
use src\Agendamento\Models\Agendamento;

class Sala extends Model
{
    protected $table = 'salas';
    protected  $primaryKey = 'id';

    protected $fillable = ['nome', 'descricao'];
    protected $hidden = ['created_at', 'updated_at'];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'sala_id');
    }
    
    public function ativar() {
        $this->active = 1;
        $this->save();
    }

    public function desativar() {
        $this->active = 0;
        $this->save();
    }
}