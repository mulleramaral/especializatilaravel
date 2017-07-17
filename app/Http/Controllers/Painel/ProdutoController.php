<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdutoController extends Controller
{
    protected $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recupera todos os produtos cadastrados
        $produtos = Produto::paginate(4);
        //Mostra a view
        return view('painel.produto.index',compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.produto.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dadosForm = $request->except('_token');
        $validator = validator($dadosForm,Produto::$rules);
        if($validator->fails()){
            return redirect('/produto/create')
                   ->withErrors($validator)
                   ->withInput();
        }
        $insert = Produto::create($dadosForm);
        //dd($insert);
        if($insert)
            return redirect()->route("produto.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produto->find($id);
        return view("painel.produto.show",compact("produto"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Recupera o produto pelo seu id
        $produto = $this->produto->find($id);
        //Mostra view editar os dados
        return view('painel.produto.create-edit',compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dadosForm = $request->all();

        $rules = [
            'nome' => 'required|min:3|max:150',
            'codigo' => "required|numeric|unique:produto,codigo,{$id}"
        ];

        $validator = validator($dadosForm,$rules);
        if($validator->fails()){
            return redirect("/produto/{$id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        //Recupera o produto
        $produto = $this->produto->find($id);

        //Edita o produto
        $update = $produto->update($request->all());
        if($update){
            return redirect('/produto');
        }

        return redirect("/produto/{$id}/edit")
                        ->withErrors('errors','Falha ao editar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);
        $delete = $produto->delete();
        if($delete)
            return redirect("/produto");
        else
            return redirect("/produto/$id");
        return "Destruindo o item de id {$id}";
    }
}
