@extends('adminlte::page')

@section('title', 'INSUMOS')

@section('content_header')
    <h1>Insumos <a href="{{ route('supplies.create')}}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <form action="{{ route('supplies.search')}}"  class="form form-inline">
                @csrf 
                <input type="text" name='filter' placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
               <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Custo</th>
                    <th>Mes e Ano</th>
                    <th width="450px">Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($supplies as $supply)
                        <tr>
                            <td>
                                {{ $supply->code}}
                            </td>
                            <td>
                                {{ $supply->description}}
                            </td>
                            <td>
                                {{ $supply->cost}}
                            </td>
                            <td>
                                {{ $supply->month_and_year}}
                            </td>
                            <td style="width=10px">
                                <a href="{{ route('supplies.edit', $supply->id) }}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $supplies->appends($filters)->links() !!}
            @else
            {!! $supplies->links() !!}
            @endif
        </div>
    </div>
@stop