<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';

    protected $fillable = ['nome','codigo'];
    //protected $guarded = ['tipo'];

    static $rules = [
        'nome' => 'required|min:3|max:150',
        'codigo' => 'required|numeric|unique:produto'
    ];
}
