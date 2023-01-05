@extends('layout')

@section('content')
    <div class="container-fluid m-auto p-4 position-static h-auto d-md-inline-flex shadow-sm" id="table">
        {{$msg ?? ''}}
        @if ($errors->any())
                    <div style="background-color:red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <table class="table table-primary table-striped caption-top">
            <caption>Lista de Autuações Pendentes</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">Código AIT</th>
                    <th scope="col">Código Infração</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Data de Criação</th>
                    <th scope="col">Expira Em</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aits as $ait)
                    <tr>
                        <th scope="row">{{$ait->cod_ait}}</th>
                        <td>{{$ait->codigo_infracao}}</td>
                        <td>{{$ait->placa}}</td>
                        <td>{{$ait->created_at}}</td>
                        <td>"Em Breve"</td>
                        <td>
                            <a href=""> <button class="btn btn-sm btn-secondary">Iniciar</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container-fluid w-100" >
        <div class="row p-2">
            <div class="col-md-2">
                {{$aits->appends($request)->links()}}
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-4">
                <caption>Exibindo {{$aits->count()}} registro de {{$aits->total()}}</caption>
            </div>
        </div>
    </div>
@endsection


