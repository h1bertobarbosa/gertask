<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    protected $table = "tarefas";
    protected $fillable = [
        'id',
        'titulo',
        'descricao',
        'ordem'
    ];
}
