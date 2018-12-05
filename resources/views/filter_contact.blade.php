@extends('layouts.master')

@section('content')
    
    <div class="container mt-2">
        <h1 align="center">{{ $msgtitulo }}</h1>
            @if (isset($sucesso) && $sucesso)
                @php $msgclass="alert alert-success" @endphp
            @elseif(count($errors) > 0 ) 
                @php $msgclass="alert alert-warning" @endphp
            @else
                @php $msgclass="alert alert-info" @endphp
            @endif  
        <div class="{{ $msgclass }}">
                    <h2 align="center">{{ $msgstatus }}</h2>
        </div>
        
        <h3>Tabela com filtro</h3>
        <p>Digite algo no campo de filtro para pesquisar a tabela por nome, ou email:</p>  
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        {{csrf_field()}}
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Contato</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Data Nascimento</th>
                    <th>Cidade</th>
                    <th>Cep</th>
                    <th>Mensagem</th>
                    <th>Aceita Novidades</th>
                    <th>User id</th>
                    <th>Exibir</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody id="myTable">
                @foreach($contacts as $contact )
                    <tr>    
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->nome }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->telefone }}</td>
                        <td>{{ $contact->data_nascimento }}</td>
                        <td>{{ $contact->cidade }}</td>
                        <td>{{ $contact->cep }}</td>
                        <td>{{ $contact->mensagem }}</td>
                        <td>{{ $contact->aceita_novidades }}</td>
                        <td>{{ $contact->user_id }}</td>
                        <td><a href="{{ url('/') }}/contact/read/{{ $contact->id }}">Exibir</a></td>
                        <td><a href="{{ url('/') }}/contact/edit/{{ $contact->id }}">Editar</a></td>
                        <td><a href="{{ url('/') }}/contact/predelete/{{ $contact->id }}">Deletar</a></td>
                    </tr>
                @endforeach                
            </tbody>
        </table>
        <p>Note que iniciamos a pesquisa em tbody, para prevenir o filtro da linha de cabeçalho.</p>
        
        <script>
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </div>

@endsection