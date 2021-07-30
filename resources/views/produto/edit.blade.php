@extends('layouts.app')

@section('content')
<div class="container">
  <br>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h2>Editar Produto</h2>
    </div>
    <br>
    <div class="col-md-12">
      @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif
      @if (session('error'))
      <div class="alert alert-error" role="alert">
        {{ session('error') }}
      </div>
      @endif
      <form action="{{ route('altera_produto', ['id' => $produto->id]) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="nome">Nome: </label>
          <input type="text" id="nome" name="nome" value="{{$produto->nome}}" class="form-control ml-2">
        </div>
        <div class="form-group">
          <label for="preco">Preço: </label>
          <input type="number" step="0.01" id="preco" name="preco" value="{{$produto->preco}}" onchange="this.value = this.value.replace(/,/g, '.')" class="form-control ml-2">
        </div>
        <div class="form-group">
          <label for="quantidade">Quantidade: </label>
          <input type="text" id="quantidade" name="quantidade" value="{{$produto->quantidade}}" class="form-control ml-2">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <div class="float-right">
          <a href="{{ route('produto.index') }}" class="btn btn-primary">Voltar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection