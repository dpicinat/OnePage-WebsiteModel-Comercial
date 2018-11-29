@extends('layouts.master')

@section('content')

    <div class=" container-fluid">
      <div class="userBox center-block contatiner">
        <form action="/contato_atendente" method="post">
          {!!csrf_field()!!}
          <div class="container-fluid">
            <div class="contactData row px-0 mx-0 col-12  col-sm-12 col-md-12 col-lg-12">
              <label class="contactLabel  col-sm-12 col-md-6 col-lg-4"> Nome
                <br>
                <input class="fieldLabel" type="text" name="nome" placeholder="Nome Completo">
                <br>
              </label>
              <br>
              <label class="contactLabel col-sm-12 col-md-6 col-lg-4"> Email
                <br>
                <input class="fieldLabel" type="email" name="email" placeholder="seuemail@mail.com">
                <br>
              </label>
              <br>
              <label class="contactLabel col-sm-12 col-md-6 col-lg-4"> Telefone
                <br>
                <input  class="fieldLabel" type="number" name="telefone" placeholder="+55(11)99000-0000">
                <br>
              </label>
              <br>
              <label class="contactLabel col-sm-12 col-md-6 col-lg-4"> Data Nascimento
                <br>
                <input class="fieldLabel" type="date" name="data_nascimento" placeholder="00/00/0000">
                <br>
              </label>
              <label class="contactLabel col-sm-12 col-md-6 col-lg-4"> Cidade
                <br>
                <input class="fieldLabel" type="text" name="cidade" placeholder="Cidade">
                <br>
              </label>
              <label class="contactLabel col-sm-12 col-md-6 col-lg-4"> Cep
                <br>
                <input  class="fieldLabel" type="number" name="cep" placeholder="00000-000">
                <br>
              </label>
              <div class="form-group  col-sm-12 col-md-12 col-lg-12">
                <br>
                <label for="Textarea">Mensagem</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" name="mensagem"></textarea>
              </div>
              {{-- <label class="contactLabel col-sm-12 col-lg-12">Mensagem
                <br>
                <textarea class="userBordas" name="mensagem"> </textarea>
              </label> --}}
              <br>
              <label class="contactLabel col-sm-12 col-md-12 col-lg-12"> Aceito receber novidades
                <Input type="checkbox" name="novidades" >
                </Input>
              </label>
            </div>
           </div>
          {{-- <Label> Motivo do Contato
            <select class="userBordas" name="motivo_contato">
                <option>Selecione um assunto</option>
                <option value="Entrega">Entrega</option>
                <option value="Pagamento">Pagamento</option>
                <option value="Devolução">Devolução</option>
                <option value="Outros">Outros</option>
            </select>
          </Label> --}}          
          <br>
          <button class="userBordas mb-3" type="reset">Limpar</button>
          <button  class="userBordas mb-3" type="submit">Enviar</button>
        </form>
      </div> <!-- <div class="loginBox center-block">-->
    </div> <!-- </div colunas>-->
</div> <!-- </div container>-->
<br>
<br>
@endsection
