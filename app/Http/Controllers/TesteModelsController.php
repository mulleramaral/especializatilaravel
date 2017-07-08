<?php

namespace App\Http\Controllers;

use App\Models\Painel\Produto;
use Illuminate\Http\Request;

class TesteModelsController extends Controller
{
    public function index()
    {

        $produto = new Produto();
        /*
        $produto->nome = 'Insert new prod';
        $produto->codigo = 1236;
        dd($produto->save());
        */

        /*
        return $produto->insert([
            'nome' => 'Produto Novo',
            'codigo' => 1213
        ]);
        */

        return $produto->create([
            'nome' => 'Produto Novo',
            'codigo' => 1213
        ]);
    }

    public function update($id)
    {
        $produto = Produto::find($id);

        dd($produto->update([
            'nome' => 'update 2',
            'codigo' => 564
        ]));
    }

    public function delete($id)
    {
        $produto = Produto::find($id);
        dd($produto->delete());
    }
}
