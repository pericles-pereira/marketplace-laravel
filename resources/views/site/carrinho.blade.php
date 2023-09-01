@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container">

  @if ($mensagem = Session::get('sucesso'))
      
      <div class="card green">
        <div class="card-content white-text">
          <span class="card-title">Parabéns!</span>
          <p>{{ $mensagem }}</p>
        </div>
      </div>

  @endif

  @if ($mensagem = Session::get('aviso'))
      
  <div class="card blue">
    <div class="card-content white-text">
      <span class="card-title">Tudo bem!</span>
      <p>{{ $mensagem }}</p>
    </div>
  </div>

  @endif


  @if ($itens->count() == 0)

  <div class="card orange">
    <div class="card-content white-text">
      <span class="card-title">Seu carrinho está vazio!</span>
      <p>Aproveite nossas promoções!</p>
    </div>
  </div>

  @else
      
    <h5>Seu Carrinho Possui {{ $itens->count() }} produtos.</h5>
  
    <table class="striped">
        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th></th>
          </tr>
        </thead>

        <tbody>

        @foreach ($itens as $item)
          <tr>
            <td><img src="{{ $item->attributes->image }}" alt="" width="70" class="responsive-img circle"></td>
            <td>{{ $item->name }}</td>
            <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>
            

            {{-- BTN ATUALIZAR --}}
            <form action="{{ route('site.atualizaCarrinho') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <input type="hidden" name="id" value="{{ $item->id }}">
            <td><input style="width: 40px; font-weight: 900;" class="white center" min="1" type="number" name="quantity" value="{{ $item->quantity }}"></td>
            <td>
              <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
            </form>

              {{-- BTN REMOVER --}}
              <form action="{{ route('site.removeCarrinho') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <input type="hidden" name="id" value="{{ $item->id }}">
              <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
              </form>
          
          </td>
          </tr>
        @endforeach

        </tbody>
      </table>

      <div class="card orange">
        <div class="card-content white-text">
          <span class="card-title">R$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }}</span>
          <p>Pague em até 12x sem juros!</p>
        </div>
      </div>
  
      @endif

    <div class="row container center">
        <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">arrow_back</i></a>    
        <a href="{{ route('site.limparCarrinho') }}" class="btn waves-effect waves-light blue">Limpar Carrinho<i class="material-icons">clear</i></a>
        <button class="btn waves-effect waves-light green">Finalizar Pedido<i class="material-icons">check</i></button>     
    </div>

</div>
    
@endsection

