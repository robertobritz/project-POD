@extends('adminlte::page')

@section('title', "Editar o insumo {$supply->description}")

@section('content_header')
    <h1>Editar o insumo {{$supply->description}}</h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('supply.update', $supply->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

            <div class="form-group">
                <label>* Descrição:</label>
                <textarea name="description" cols="30" rows="5" class="form-control">{{ $supply->description ?? old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label>* Custo:</label>
                <input type="text" name="cost" class="form-control" placeholder="Preço" value="{{ $supply->cost ?? old('cost')}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
                
        </div>
    </div>
@endsection