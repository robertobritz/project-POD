@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')
    <h1>Importar Nova Lista de Suprimentos</h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('supplies.upload') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label>* Excel Supplies:</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

                
        </div>
    </div>
@endsection