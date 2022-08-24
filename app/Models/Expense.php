<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'cost_center_id',
        'type_expense_id',
        'descricao',
        'valor',
        'data_vencimento',
        'data_pagamento',
        'status',

    ];

    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function cost_center(){
        return $this->belongsTo(CostCenter::class);
    }
    public function type_expense(){
        return $this->belongsTo(TypeExpense::class);
    }
}
