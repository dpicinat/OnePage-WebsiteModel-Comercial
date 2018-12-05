<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Role;
use App\Contact;

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

    public function index() {
        // 
        $users = User::paginate(5);
        //$users = Movie::orderBy('name')->paginate(10);
        //$users = Movie::inRandomOrdery()->paginate(10);

        $metodo = "GET";
        $msgtitulo = "Index dos Usuários";
        $msgstatus = "Escolha Exibir, Editar ou Excluir";
        
        return view('index_users')
            ->with('users', $users)
            ->with('metodo',$metodo)
            ->with('msgtitulo',$msgtitulo)   
            ->with('msgstatus',$msgstatus)
        ;
    }

    public function directory() {
        $contacts = Contact::all();     
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

    public function read($id) {
        // 
        $contacts = Contact::find($id);

        $metodo = "GET";
        $msgtitulo = "3. Leia dados do Usuário";
        $msgbotao = "Retornar ->";
        $sucesso = null;
        $action=url('/')."/contato";
        $view="show_contact";

        if ($user) {  
            $user->fill(['email_confirm' => $user->email ]);
            $user->fill(['password_confirm' => $user->password ]);
    
            $msgstatus = "Confira os dados abaixo";
        } else {
            $msgstatus = "Usuário não localizado";
            $user = new User;
        }

        return view( $view )
            ->with('sucesso',$sucesso)
            ->with('metodo',$metodo)
            ->with('action',$action)
            ->with('msgtitulo',$msgtitulo)   
            ->with('msgstatus',$msgstatus)
            ->with('msgbotao',$msgbotao)
            ->with('user',$user)
        ;
    }

    public function edit($id) {
        // 
        $contact = Contact::find($id);
        //$contact->fill(['email_confirm' => $contact->email ]);
        //$contact->fill(['password_confirm' => $contact->password ]);
        $contact->email_confirm = $contact->email;
        $contact->password_confirm = $contact->password;

        $metodo = "PATCH";
        $msgtitulo = "4. Edite dados";
        $msgstatus = "Edite os dados abaixo";
        $msgbotao = "Atualizar ->";
        $action=url('/')."/contact/update/$contact->id";
        $sucesso = null;
        $view="form_contact";
        return view( $view )
            ->with('metodo',$metodo)
            ->with('action',$action)
            ->with('sucesso',$sucesso)
            ->with('msgtitulo',$msgtitulo)   
            ->with('msgstatus',$msgstatus)
            ->with('msgbotao',$msgbotao)
            ->with('contact',$contact)
        ;
    }

    public function update(Request $request, $id) {
        //

        $contact = Contact::find($id);
        // os campos ['email_confirm'] ['password_confirm'] não existem na tabela users, portanto precisam ser criados no objeto
        
        $this->validate($request,[
            'email' => Rule::unique('contacts')->ignore($contact->email, 'email'),    
            'email' => 'required|min:6|max:255',
            'email_confirm' => 'required_with:email|same:email|min:6',
            'telefone' => 'required|min:9|max:11',
            'data_nascimento' => 'required|min:10|max:10',
            'cidade' => 'min:3|max:255',
            'cep' => 'min:8|max:8',
            // 'user_id' => 'required|min:1|max:1|unique:products',
            'mensagem' => 'min:3|max:255',
        ]);

        $contact->email = $request->input('email');
        $contact->telefone = $request->input('telefone');
        $contact->data_nascimento = $request->input('data_nascimento');
        $contact->cidade = $request->input('cidade');
        $contact->cep = $request->input('cep');
        // $contact->user_id = $request->input('user_id');
        $contact->mensagem = $request->input('mensagem');
        
        // save() faz Update dos dados no banco de dados   
        $result = $contact->save();         
        $msgtitulo = "5. Atualizar dados do Usuário";
        
        if ($result) {
            $metodo = "GET";
            $msgstatus = "Usuário atualizado com sucesso!";
            $msgbotao = "Retornar ->";
            $action=url('/')."/contacts";  
            $sucesso=true;
            $view='show_contact';
        } else {
            $metodo = "PATCH";
            $msgstatus = "Ops, ocorreu um erro ao tentar salvar o contato, tente novamente!";
            $action=url('/')."/contact/update/$contact->id";
            $sucesso=false;
            $msgbotao = "Atualizar ->";
            $view="form_contact";
        }     
        return view($view)
            ->with('metodo',$metodo)
            ->with('action',$action)
            ->with('sucesso',$sucesso)
            ->with('msgtitulo',$msgtitulo)   
            ->with('msgstatus',$msgstatus)
            ->with('msgbotao',$msgbotao)
            ->with('contact',$contact)
        ;
    }

    public function delete ($id) {
        $contact = Contact::find($id);
        $msgtitulo = "7. Deletar Contato";
        $msgstatus = "Produto $product->name excluído com sucesso!";  
        $deleted_id = $product->id;
        $result = $product->delete();
        //$result = Product::destroy($id);
        if ( $result) {
            $metodo = "GET";
            $msgbotao = "Retornar ->";
            $action=url('/')."/products/";
            $sucesso=true;
            $product = new Product;
        } else {
            $metodo = "GET";
            $msgstatus = "Ops, ocorreu um erro ao tentar excluir o Produto, tente novamente!";
            $action=url('/')."/product/preDelete/$deleted_id";
            $msgbotao = "Deletar ->";
            $sucesso=false;
        }     
        $view="show_product";
        
        return view( $view )
            ->with('sucesso',$sucesso)
            ->with('metodo',$metodo)
            ->with('action',$action)
            ->with('msgtitulo',$msgtitulo)   
            ->with('msgstatus',$msgstatus)
            ->with('msgbotao',$msgbotao)
            ->with('product',$product)
        ;
    }    
}