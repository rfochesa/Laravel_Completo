@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Contatos                   
                </div>

                <div class="panel-body">                   
                   <table class="table">
                      <th>Nome</th>
                      <tbody>
                         @foreach($contatos as $contato)
                         <tr>
                            <td>{{ $contato->nome }}</td>
                         </tr>
                         @endforeach
                       </tbody>
                   </table>        
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
