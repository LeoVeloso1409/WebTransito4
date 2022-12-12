@extends('layout')

@section('content')
    <div class="container-fluid m-auto p-4 position-static h-auto d-md-inline-flex shadow-sm" id="table">
        <table class="table table-primary table-striped caption-top">
            <caption>Lista de Autuações Pendentes</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">Código AIT</th>
                    <th scope="col">Código Infração</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Agente</th>
                    <th scope="col">Matricula</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <!--
                foreach ($aitsFalse as $ait)
                    <tr>
                        <th scope="row">$ait->cod_ait}}</th>
                        <td>$ait->codigo_infracao}}</td>
                        <td>$ait->placa}}</td>
                        <td>$ait->nome}}</td>
                        <td>$ait->matricula}}</td>
                        <td>
                            <a href="route('edit.ait', /*['id' => $ait->cod_ait]*/)}}"> <button class="btn btn-sm btn-secondary">Iniciar</button></a>
                        </td>
                    </tr>
                endforeach
                -->
            </tbody>
        </table>
    </div>
@endsection


