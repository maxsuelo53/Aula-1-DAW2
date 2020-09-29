<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carro;

class carroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$carro = new carro();
		$carros= carro::All();
		return view("carro.index",[
		"carros"=>$carros,
		"carro"=> $carro
		]);
        //
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
		if($request->get("id")==""){
			$carro = new carro();
		}else {
			$carro = carro::find($request->get("id"));
		}
		$carro->modelo = $request->get("modelo");
		$carro->marca = $request->get("marca");
		$carro->placa = $request->get("placa");
		$carro->cor = $request->get("cor");
		$carro->ano = $request->get("ano");
		$carro->save();
		return redirect("/carro");
        //
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
    public function edit($id)
    {
		$carros = carro::All();
		$carro = carro::find($id);
		return view("carro.index",[ 
		"carro" => $carro,
		"carros" => $carros
		]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		carro::destroy($id);
		return redirect("/carro");
        //
    }
}
