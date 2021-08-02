<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $produto = Produto::where(['user_id' => $userId])->get();
        return view('produto.list', ['produto' => $produto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $input = $request->input();
        $input['user_id'] = $userId;
        $ProdutoStatus = Produto::create($input);
        if ($ProdutoStatus) {
            $request->session()->flash('success', 'Produto adicionado com sucesso');
        } else {
            $request->session()->flash('error', 'ops, produto não foi salvo');
        }
        return redirect('produto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = Auth::user()->id;
        $produto = Produto::where(['user_id' => $userId, 'id' => $id])->first();
        if (!$produto) {
            return redirect('produto')->with('error', 'Produto not found');
        }
        return view('produto.view', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = Auth::user()->id;
        $produto = Produto::where(['user_id' => $userId, 'id' => $id])->first();
        if ($produto) {
            return view('produto.edit', ['produto' => $produto]);
        } else {
            return redirect('produto')->with('error', 'Produto não encontrado');
        }
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
        $userId = Auth::user()->id;
        $produto = Produto::find($id);
        if (!$produto) {
            return redirect('produto')->with('error', 'Produto não encontrado.');
        }
        $input = $request->input();
        $input['user_id'] = $userId;
        $produtoStatus = $produto->update($input);
        if ($produtoStatus) {
            return redirect('produto')->with('success', 'Produto editado com sucesso.');
        } else {
            return redirect('produto')->with('error', 'Ops não foi possível editar o produto');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = Auth::user()->id;
        $produto = Produto::where(['user_id' => $userId, 'id' => $id])->first();
        $respStatus = $respMsg = '';
        if (!$produto) {
            $respStatus = 'error';
            $respMsg = 'Produto não encontrado';
        }
        $produtoDelStatus = $produto->delete();
        if ($produtoDelStatus) {
            $respStatus = 'success';
            $respMsg = 'Produto deletado com sucesso';
        } else {
            $respStatus = 'error';
            $respMsg = 'Ops não foi possível deletar o produto';
        }
        return redirect('produto')->with($respStatus, $respMsg);
    }
}
