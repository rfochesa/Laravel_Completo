<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Redirect;


use PDF;

class ClientesController extends Controller {

    public function index() {
    	$clientes = Cliente::get();

        return view('clientes.lista', ['clientes' => $clientes]);
    }
       

    public function novo() {
    	return view('clientes.formulario');
    }

    public function salvar(Request $request) {

    	$cliente = new Cliente();

    	$cliente = $cliente->create($request->all());

        \Session::flash('mensagem_sucesso', 'Cliente cadastrado com sucesso!');

    	return Redirect::to('clientes/novo');

    }

    public function editar($id)  {

        $cliente = Cliente::findOrFail($id);

       return view('clientes.formulario', ['cliente' => $cliente]);


    }

    public function atualizar($id, Request $request)  {

        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->all());

        \Session::flash('mensagem_sucesso', 'Cliente atualizado com sucesso!');

        return Redirect::to('clientes/'.$cliente->id.'/editar');

    }


    public function deletar($id)  {

        $cliente = Cliente::findOrFail($id);

        $cliente->delete();
         
        \Session::flash('mensagem_sucesso', 'Cliente excluído com sucesso!');

        return Redirect::to('clientes');

    }




    function generate_pdf() {       
        
        $data = ['foo' => 'bar'];
        
        $pdf = PDF::loadView('pdf.document', $data);
        
        return $pdf->stream('document.pdf');
    }




}
