@extends('layout')


@section('content')

    <div class="container-fluid m-auto p-4 position-static h-auto shadow-sm" id="register">

        <legend><h3>Cadastro de Usuário</h3></legend>
        <form class="row g-3" method="POST" action="{{ route('register') }}">

            @csrf

            <fieldset class="shadow-sm p-4">
                <!--
                <x-auth-validation-errors class="mb-4" :*errors="$errors" />
                -->
                <div class="row p-2">
                    <!-- Nome -->
                    <div class="col-md-4">
                        <input id="name" class="form-control block mt-1 w-full" type="text" name="name" :value="old('name')"
                            placeholder="Nome" required autofocus />
                    </div>

                    <!-- Matrícula -->
                    <div class="col-md-4">
                        <input id="matricula" class="form-control block mt-1 w-full" type="text" name="matricula"
                            :value="old('matricula')" placeholder="Matrícula" required autofocus />
                    </div>

                    <!-- Email -->
                    <div class="col-md-4">
                        <input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')"
                            placeholder="Email" required />
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-md-3">
                        <select id="orgao" name="orgao" class="form-select" required>
                            <option selected>Orgão</option>
                            <option value="PMMG">PMMG</option>
                            <option value="PCMG">PCMG</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="unidade" name="unidade" class="form-select" required>
                            <option selected>Unidade</option>
                            <option value="1 BPM">1 BPM</option>
                            <option value="2 BPM">2 BPM</option>
                            <option value="3 BPM">3BPM</option>
                            <option value="...">...</option>
                            <option value="55 BPM">55BPM</option>

                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="funcao" name="funcao" class="form-select" required>
                            <option selected>Função</option>
                            <option value="ADMIN">ADMINISTRADOR</option>
                            <option value="AGENTE">AGENTE</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="status" name="status" class="form-select" required>
                            <option selected>Situação</option>
                            <option value="ATIVO">ATIVO</option>
                            <option value="INATIVO">INATIVO</option>
                        </select>
                    </div>
                </div>

                <div class="row p-2">
                    <!-- Password -->
                    <div class="col-md-4">
                        <input id="password" class="form-control block mt-1 w-full" type="password" name="password"
                            placeholder="Senha" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-4">
                        <input id="password_confirmation" class="form-control block mt-1 w-full" type="password"
                            name="password_confirmation" placeholder="Confirmar Senha" required />
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row p-2">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
