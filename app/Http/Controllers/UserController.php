<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $msg = '')
    {
        $users = User::paginate(10);

        return view('user.index', ['users'=>$users, 'request'=>$request->all(), 'msg'=>$msg]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos campos obrigatórios do formulário
        $request->validate(
            [
                'nome' => 'required',
                'matricula' => 'required|size:7|unique:users,matricula',
                'email' => 'required|email',
                'orgao' => 'required',
                'unidade' => 'required',
                'funcao' => 'required',
                'status' => 'required',
                'password' => 'required|min:6|max:8',
                //'password_confirmation' => 'required|confirmed'
            ],

            [
                'nome.required' => 'O campo Nome é obrigatório',
                'matricula.required' => 'O campo Matrícula é obrigatório',
                'matricula.numeric' => 'O campo Matrícula deve conter 7 dítgitos numéricos',
                'matricula.size' => 'O campo Matrícula deve conter 7 dítgitos numéricos',
                'matricula.unique' => 'Este número de Matrícula já existe',
                'email.required' => 'O campo Email é obrigatório',
                'email.email' => 'O campo Email não foi preenchido corretamente',
                'orgao.required' => 'O campo Orgão é obrigatório',
                'unidade.required' => 'O campo Unidade é obrigatório',
                'funcao.required' => 'O campo Função é obrigatório',
                'status.required' => 'O campo Situação é obrigatório',
                'password.required' => 'O campo Senha é obrigatório',
                'password.min' => 'O campo Senha deve conter no mínimo 6 caracteres',
                'password.max' => 'O campo Senha deve conter no máximo 8 caracteres',
                //'password_confirmation.confirmed' => 'O campo Confirmar Senha deve ser igual ao campo Senha',
                //'password_confirmation.required' => 'O campo Confirmar Senha é obrigatório'
            ]
        );


        $user = User::create([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'email' => $request->email,
            'orgao' => $request->orgao,
            'unidade' => $request->unidade,
            'funcao' => $request->funcao,
            'status' => $request->status,
            'password' =>Hash::make($request->password),

        ]);

        if($user){
            $msg = 'Usuário cadastrado com sucesso!';
            return redirect()->route('index.users', ['msg'=>$msg]);
        }
        else{
            $msg = 'Erro ao tentar cadastrar novo usuário!';
            return view('user.register', compact('msg'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $msg = '')
    {
        //$user = User::find($id);
        $user = User::find($id);

        //dd($user);

        return view('user.edit', ['user'=>$user, 'msg'=>$msg]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $msg = '' )
    {
        $user = User::find($id);

        $request->validate(
            [
                'nome' => 'required',
                'matricula' => 'required|size:7|unique:users,matricula',
                'email' => 'required',
                'orgao' => 'required',
                'unidade' => 'required',
                'funcao' => 'required',
                'status' => 'required',
                //'password' => 'required|min:6|max:8',
                //'password_confirmation' => 'required|confirmed'
            ],

            [
                'nome.required' => 'O campo Nome é obrigatório',
                'matricula.required' => 'O campo Matrícula é obrigatório',
                'matricula.numeric' => 'O campo Matrícula deve conter 7 dítgitos numéricos',
                'matricula.size' => 'O campo Matrícula deve conter 7 dítgitos numéricos',
                'matricula.unique' => 'Este número de Matrícula já existe',
                'email.required' => 'O campo Email é obrigatório',
                'orgao.required' => 'O campo Orgão é obrigatório',
                'unidade.required' => 'O campo Unidade é obrigatório',
                'funcao.required' => 'O campo Função é obrigatório',
                'status.required' => 'O campo Situação é obrigatório',
                //'password.required' => 'O campo Senha é obrigatório',
                //'password.min' => 'O campo Senha deve conter no mínimo 6 caracteres',
                //'password.max' => 'O campo Senha deve conter no máximo 8 caracteres',
                //'password_confirmation.confirmed' => 'O campo Confirmar Senha deve ser igual ao campo Senha',
                //'password_confirmation.required' => 'O campo Confirmar Senha é obrigatório'
            ]
        );

        $update = $user->update($request->all());

        if($update){
            $msg = 'Registro atualizado com sucesso!';
            return redirect()->route('index.users', ['msg'=>$msg]);
        }
        else{
            $msg = 'Erro ao tentar atualizar registro!';
            return redirect()->route('index.users', ['msg'=>$msg]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('index.users');
    }
}
