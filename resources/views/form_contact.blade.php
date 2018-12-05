@extends('layouts.master')

@section('content')

<div class="container">
<h1 align="center">{{ $msgtitulo }}</h1>

@if (isset($sucesso) && $sucesso)
    @php $msgclass="alert alert-success" @endphp
@elseif(count($errors) > 0 ) 
    @php $msgclass="alert alert-warning" @endphp
@else
    @php $msgclass="alert alert-info" @endphp
@endif
<div class="row">

    <form class="form-group col-12" id="form" name="form_contact" method="POST" action="{{$action}}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field($metodo)}}
        <div class="form-group  {{ $msgclass }}" role="alert">
            <h2 align="center">{{ $msgstatus }}</h2>
        </div>
        <div class="row">
            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <label for="id">ID do Contato</label>
                <input type="number" class="form-control disabled" id="id" name="id" min="0" step="1" value="{{ $contact->id}}" placeholder="ID" readonly>
            </div>
            <div class="form-group col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <label for="name">Nome do Contato</label>
                <input type="text" class="form-control" name="nome" id="name" value="{{ $contact->nome }}" placeholder="Insira Nome do Contato" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" placeholder="Insira email do Contato" />
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="email_confirm">Confirmação de email</label>
                <input type="email" class="form-control" id="email_confirm" name="email_confirm" value="{{ $contact->email_confirm }}" placeholder="Confirme email do Contato" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="telefone">Telefone</label>
                <input type="number" class="form-control" id="telefone" name="telefone" value="{{ $contact->telefone }}" placeholder="Insira Telefone do Contato" />
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="data_nascimento">Data Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $contact->data_nascimento}}" placeholder="Insira Data Nascimento do Contato" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $contact->cidade }}" placeholder="Insira Cidade do Contato" />
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="cep">Cep</label>
                <input type="number" class="form-control" id="cep" name="cep" value="{{ $contact->cep}}" placeholder="Insira Cep do Contato" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <label for="user_id">ID do Usuário</label>
                <input type="number" class="form-control disabled" id="user_id" name="user_id" min="0" step="1" value="{{ $contact->User_id }}" placeholder="ID User">
            </div>
            <div class="form-group col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <label for="Textarea">Mensagem do Contato</label>
                <input type="text" class="form-control" name="mensagem" id="name" value="{{ $contact->mensagem }}" placeholder="Insira Nome do Contato" />
            </div>
        </div>
            
        {{-- <div class="row">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}" placeholder="Insira uma senha" />
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="password_confirm">Confirmação de Senha</label>
                <input type="password" class="form-control" id="password_confirm" name="mensagem" value="{{ $user->password_confirm }}" placeholder="Redigite sua senha" />
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="remember_token">Lembrete de Senha</label>
                <input type="text" class="form-control" id="remember_token" name="remember_token" value="{{ $user->remember_token }}" placeholder="Insira um lembrete de senha" />
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="role_id">Funções de Usuário</label>
                <select class="form-control" name="role_id" id="role_id">
                    @foreach ($user->roles as $role) 
                        <option value="{{ $role->id }}" 
                            @if( $role->id == $user->role_id )
                            {{"selected"}}
                            @endif
                            >{{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div> --}}

        </div>

        <div class="row">
            <div class="form-group col-12">    
            @if (count($errors) > 0 ) 
                <div class="alert alert-danger">
                    <ul> 
                        @foreach($errors->all() as  $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>    
        </div>
        <div class="row"> 
            <div class="form-group col-12 ">
                <button type="submit" name="submit" class="btn btn-primary">{{ $msgbotao }}</button>	
            </div>
        </div>

        <p>Criado em 19/08/2018.</p>
    </form>
</div>
</div>

@endsection
