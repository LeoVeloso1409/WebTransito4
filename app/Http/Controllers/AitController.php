<?php

namespace App\Http\Controllers;

use App\Ait;
use Illuminate\Http\Request;

class AitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $aits = Ait::paginate(10);

        //dd($aits);

        return view('ait.index', ['aits'=>$aits, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'user_id'=>'required',
                'cod_ait'=>'required|unique:aits,cod_ait',
                'orgao_autuador'=>'required',
                'matricula'=>'required',
                'nome'=>'required'
        ]);

        $ait = Ait::create([
            'user_id'=>$request->user_id,
            'cod_ait'=>$request->cod_ait,
            'orgao_autuador'=>$request->orgao_autuador,
            'matricula'=>$request->matricula,
            'nome'=>$request->nome,
            'status'=> 0,
        ]);

        if($ait){
            return redirect()->route('ait.index');
        }
        else{
            $msg = 'Erro ao tentar criar novo AIT!';

            return view('ait.index', compact('msg'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ait  $ait
     * @return \Illuminate\Http\Response
     */
    public function show(Ait $ait)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ait  $ait
     * @return \Illuminate\Http\Response
     */
    public function edit(Ait $ait)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ait  $ait
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ait $ait)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ait  $ait
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ait $ait)
    {
        //
    }
}
