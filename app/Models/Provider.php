<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo',
        'email',
        'telefone',
        'rua',
        'n',
        'bairro',
        'cidade',
        'estado',
        'complemento',
        'cpf_cnpj'
    ];

    public function expense(){
        return $this->belongsTo(Expense::class);

    }

}
