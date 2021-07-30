@extends('layouts.app')

@section('content')
<div class="container">
  <br>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2>Lista de Produtos</h2>
    </div>
    <div class="col-md-6">
      <div class="float-right">
        <a href="{{ route('produto.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Produto</a>
      </div>
    </div>
    <br>
    <div class="col-md-12">
      @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif
      @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div>
      @endif
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th width="5%">#</th>
            <th>Produto</th>
            <th width="10%">
              <center>Preço</center>
            </th>
            <th width="10%">
              <center>Quantidade</center>
            </th>
            <th width="14%">
              <center>Editar</center>
            </th>
            <th width="20%">
              <center>Deletar</center>
            </th>
          </tr>
        </thead>
        <tbody>
          @forelse ($produto as $produto)
          <tr>
            <th>{{ $produto->id }}</th>
            <td>{{ $produto->nome }}</td>
            <td>
              <center>{{ $produto->preco }}</center>
            </td>
            <td>
              <center>{{ $produto->quantidade }}</center>
            </td>
            <td>
              <div class="action_btn">
                <div class="action_btn">
                  <center><a href="{{ route('produto.edit', $produto->id)}}" class="btn btn-warning">Editar</a></center>
                </div>
              </div>
            </td>
            <td>
              <div class="action_btn">
                <div class="action_btn margin-left-10">
                  <form action="{{ route('produto.destroy', $produto->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <center><button class="btn btn-danger" type="submit">Deletar</button></center>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6">
              <center>Sem produtos cadastrados</center>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection