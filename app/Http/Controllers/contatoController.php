<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class contatoController extends Controller
{
    public function cadastrarContato(Request $request){
        $nome = $request->input('nome');
        $email = $request->input('email');
        $telefone = $request->input('telefone');
        $dataNascimento = $request->input('data_nascimento');
        $cidade = $request->input('cidade');
        $cep = $request->input('cep');
        // $motivoContato = $request->input('mensagem');
        $mensagem = $request->input('mensagem');
        $novidades = $request->input('novidades') === 'on' ? 1 : 0;

        
      

        $resultado = DB::table('contacts')->insert(
            // nome da coluna no banco entre aspas
            ['nome' => $nome, 
            'email' => $email, 
            'telefone' => $telefone, 
            'data_nascimento' => $dataNascimento, 
            'cidade' => $cidade,
            'cep' => $cep,
            // 'motivo_contato' => $motivoContato,
            'mensagem' => $mensagem,
            'aceita_novidades' => $novidades,
            ]
        );

        
    }

    public function directory() {
        $contacts = contato::all();     
        $metodo = "GET";
        $msgtitulo = "Lista dos Contatos";
        $msgstatus = "Escolha Exibir, Editar ou Excluir";
        
        return view('filter_contact')
            ->with('contacts',$contacts)
            ->with('metodo',$metodo)
            ->with('msgtitulo',$msgtitulo)   
            ->with('msgstatus',$msgstatus)
        ;
    }

    public function edit($id) {
        // 
        $user = User::find($id);
        //$user->fill(['email_confirm' => $user->email ]);
        //$user->fill(['password_confirm' => $user->password ]);
        $user->email_confirm = $user->email;
        $user->password_confirm = $user->password;

        $metodo = "PATCH";
        $msgtitulo = "4. Edite dados";
        $msgstatus = "Edite os dados abaixo";
        $msgbotao = "Atualizar ->";
        $action=url('/')."/user/update/$user->id";
        $sucesso = null;
        $view="form_user";//VERIFICAR COMO IRÁ FICAR
        return view( $view )
            ->with('metodo',$metodo)
            ->with('action',$action)
            ->with('sucesso',$sucesso)
            ->with('msgtitulo',$msgtitulo)   
            ->with('msgstatus',$msgstatus)
            ->with('msgbotao',$msgbotao)
            ->with('user',$user)
        ;
    }
    
}