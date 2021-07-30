@extends('layouts.app')

@section('content')
<div class="container">
  <br>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2>Produtos</h2>
    </div>
    <div class="col-md-6">
      <div class="float-right">
        <a href="{{ route('produto.index') }}" class="btn btn-primary">Voltar</a>
      </div>
    </div>
    <br>
    <div class="col-md-12">
      <br><br>
      <div class="todo-title">
        <strong>Nome: </strong> {{ $produto->nome }}
      </div>
      <br>
      <div class="todo-description">
        <strong>Preço: </strong> {{ $produto->preco }}
      </div>
      <br>
      <div class="todo-description">
        <strong>Quantidade: </strong> {{ $produto->quantidade }}
      </div>
    </div>
  </div>
</div>
@endsection