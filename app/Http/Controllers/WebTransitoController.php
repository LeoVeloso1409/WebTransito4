<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ait;
use App\User;

class WebTransitoController extends Controller
{
    public function BuscarMeusRegistros(Request $request){
        $aitsTrue = Ait::where('status', true)->paginate(10);
        //dd($aitsTrue);
        return view('ait.index', ['aitsTrue'=>$aitsTrue, 'request'=>$request->all()]);
    }

    public function PesquisarAits(){

        return view('ait.pesquisar');
    }

    public function BuscarAits(Request $request){

        //$codAit = $request->prefixo.'-'.$request->ano.'-'.$request->cod_ait;
        //dd($request);
        $aits = "";
        dd($aits);
        return view('ait.pesquisa.index', ['aits'=>$aits, 'request'=>$request->all()]);
    }


    public function PesquisarUsers(){

        return view('user.pesquisar');
    }

    public function BuscarUsers(Request $request){

        dd($request);
        $users = User::find();

        return view('user.pesquisa.index', ['users'=>$users, 'request'=>$request->all()]);
    }
}

