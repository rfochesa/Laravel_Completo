<?php

namespace App\Http\Controllers;

use App\Cliente;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    

    public function index() { }

    public function ListarCliente() {

      //$clientes = array(); XXXXXXXXXXXX

      $clientes = Cliente::get();

      header("Content-Type: application/json");
      echo json_encode($clientes);

    }    

   public function InserirCliente(Request $request) {
 
 	 	$array = array();

    	try {

           $cliente = new Cliente();

           $cliente = $cliente->create($request->all());	
 
           $array['status'] = 'S';     
	
      } catch (Exception $e) {
      		$array['status'] = 'N';
        //    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }
 
      header("Content-Type: application/json");
      echo json_encode($array);

       
    }


    public function AtualizarCliente($id, Request $request)  {

        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->all());
       
    }


    public function DeletarCliente($id)  {

        $cliente = Cliente::findOrFail($id);

        $cliente->delete();
         
    }




       




}
