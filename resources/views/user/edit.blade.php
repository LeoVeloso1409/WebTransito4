@extends('layout')


@section('content')

    <div class="container-fluid m-auto p-4 position-static h-auto shadow-sm" id="editUser">

        <legend><h3>Atualização de Usuário</h3></legend>
        <div style="background-color:red">
            {{$msg}}
        </div>

        <form class="row g-3" method="POST" action="{{route('edit.user', ['id' => $user->id])}}">

            @csrf
            @method('PUT')

            <fieldset class="shadow-sm p-4">

                @if ($errors->any())
                    <div style="background-color:red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row p-2">
                    <!-- Matrícula -->
                    <div class="col-md-3">
                        <input id="matricula" class="form-control block mt-1 w-full" type="text" name="matricula" value="{{$user->matricula}}" disabled/>
                        @if ($errors->has('matricula'))
                            {{$errors->first('matricula')}}
                        @endif
                    </div>

                    <!-- Nome -->
                    <div class="col-md-5">
                        <input id="nome" class="form-control block mt-1 w-full" type="text" name="nome" value="{{$user->nome}}"/>
                        @if ($errors->has('nome'))
                            {{$errors->first('nome')}}
                        @endif
                    </div>

                    <!-- Email -->
                    <div class="col-md-4">
                        <input id="email" class="form-control block mt-1 w-full" type="email" name="email" value="{{$user->email}}"/>
                        @if ($errors->has('email'))
                            {{$errors->first('email')}}
                        @endif
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-md-3">
                        <select id="orgao" name="orgao" class="form-select">
                            <option value="{{$user->orgao}}">{{$user->orgao}}</option>
                            <option value="PMMG" {{old('orgao') == 'PMMG' ? 'selected' : ''}}>PMMG</option>
                            <option value="PCMG" {{old('orgao') == 'PCMG' ? 'selected' : ''}}>PCMG</option>
                        </select>
                        @if ($errors->has('orgao'))
                            {{$errors->first('orgao')}}
                        @endif
                    </div>
                    <div class="col-md-3">
                        <select id="unidade" name="unidade" class="form-select">
                            <option value="{{$user->unidade}}">{{$user->unidade}}</option>
                            <option value="1 BPM" {{old('unidade') == '1 BPM' ? 'selected' : ''}}>1 BPM</option>
                            <option value="2 BPM" {{old('unidade') == '2 BPM' ? 'selected' : ''}}>2 BPM</option>
                            <option value="3 BPM" {{old('unidade') == '3 BPM' ? 'selected' : ''}}>3 BPM</option>
                            <option value="...">...</option>
                            <option value="55 BPM" {{old('unidade') == '55 BPM' ? 'selected' : ''}}>55BPM</option>
                        </select>
                        @if ($errors->has('unidade'))
                            {{$errors->first('unidade')}}
                        @endif
                    </div>
                    <div class="col-md-3">
                        <select id="funcao" name="funcao" class="form-select">
                            <option value="{{$user->funcao}}">{{$user->funcao}}</option>
                            <option value="ADMIN" {{old('funcao') == 'ADMIN' ? 'selected' : ''}}>ADMINISTRADOR</option>
                            <option value="AGENTE" {{old('funcao') == 'AGENTE' ? 'selected' : ''}}>AGENTE</option>
                        </select>
                        @if ($errors->has('funcao'))
                            {{$errors->first('funcao')}}
                        @endif
                    </div>
                    <div class="col-md-3">
                        <select id="status" name="status" class="form-select">
                            <option value="{{$user->status}}">Situação</option>
                            <option value="1" {{old('status') == '1' ? 'selected' : ''}}>ATIVO</option>
                            <option value="0" {{old('status') == '0' ? 'selected' : ''}}>INATIVO</option>
                        </select>
                        @if ($errors->has('status'))
                            {{$errors->first('status')}}
                        @endif
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row p-2">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
