<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    // Quais informações o usuário vai passar no label que serão salvas no banco de dados
    protected $fillable = [
        "cep",
        "logradouro",
        "numero",
        "bairro",
        "cidade",
        "estado",
    ];
}
