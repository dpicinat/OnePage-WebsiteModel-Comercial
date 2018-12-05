<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/home.css">
      <link rel="stylesheet" href="css/login.css">
      <link rel="stylesheet" href="css/contact.css">

      <!-- Bootstrap Projeto-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

  </head>
  <body>
    <header>
      <nav class="cabecalho navbar fixed-top navbar-expand-lg px-0">
          
        <a class="navbar-brand col-xs-12 col-sm-4 col-md-3 col-lg-2 px-0 mr-0 text-center" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Laravel') }} --}}
            <img class=""src="{{url('img/logo/ex3tr')}}.png" width="190" style="
            height: 100px;">
        </a>
       
        

            <div class="collapse navbar-collapse col-lg-6" id="navbarSupportedContent">
                    <ul class="menuHamb navbar-nav ml-auto">
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Objetivo
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item font-weight-bold" href="#intro">Introdução</a>
                                <a class="dropdown-item font-weight-bold" href="#about">Objetivo</a>
                                <a class="dropdown-item font-weight-bold" href="#history">História</a>
                                {{-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a> --}}
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Proposta
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item font-weight-bold" href="#business">O Negócio</a>
                                <a class="dropdown-item font-weight-bold" href="#witness">Testemunhos</a>
                                <a class="dropdown-item font-weight-bold" href="#why">Por que?</a>
                                {{-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a> --}}
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Notícias
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item font-weight-bold" href="#world">No Mundo</a>
                                <a class="dropdown-item font-weight-bold" href="#photos">Fotos e Fatos</a>
                                {{-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a> --}}
                            </div>
                        </li>
                        

                        
                        @if ( auth()->check() )
                            @if (auth()->user()->hasRole('Admin'))
                                <!-- Dropdown - Campo item comentado para futuro uso -->
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ url('/') }}/products" id="navbardrop" data-toggle="dropdown">
                                    Pedidos
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('/') }}/orders_pages">Listar Pedidos</a>
                                        <a class="dropdown-item" href="{{ url('/') }}/orders">Filtrar Pedidos</a>
                                        <a class="dropdown-item" href="{{ url('/') }}/order/new">Inserir Pedido</a>
                                    </div>
                                </li> --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white font-weight-bold" href="{{ url('/') }}/genres" id="navbardrop" data-toggle="dropdown">
                                    Marcas
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/brands_pages">Listar Marcas</a>
                                        @if ( auth()->check() )
                                            @if (auth()->user()->hasRole('Admin'))
                                                <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/brands">Filtrar Marcas</a>                                  
                                                <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/brand/new">Inserir Marca</a>
                                            @endif
                                        @endif
                                    </div>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link disabled" href="#"></a>
                                </li> --}}
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white font-weight-bold" href="{{ url('/') }}/products" id="navbardrop" data-toggle="dropdown">
                                    Produtos
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/products_pages">Listar Produtos</a>
                                        @if ( auth()->check() )
                                                @if (auth()->user()->hasRole('Admin'))
                                                <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/products">Filtrar Produtos</a>
                                                <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/product/new">Inserir Produto</a>
                                            @endif
                                        @endif
                                    </div>
                                </li> --}}
                                <!-- Dropdown -->
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white font-weight-bold" href="{{ url('/') }}/movies" id="navbardrop" data-toggle="dropdown">
                                    Clientes
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/customers_pages">Listar Clientes</a>
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/customers">Filtrar Clientes</a>
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/customer/new">Inserir cliente</a>
                                    </div>
                                </li> --}}

                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white font-weight-bold" href="{{ url('/') }}/users" id="navbardrop" data-toggle="dropdown">
                                    Usuários
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/users">Exibir Usuários</a>
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/user/new">Inserir Usuário</a>
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/roles">Exibir Funções</a>
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/role/new">Inserir Função</a>
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white font-weight-bold" href="{{ url('/') }}/contato" id="navbardrop" data-toggle="dropdown">
                                    Contatos
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/') }}/contacts">Exibir Contatos</a>
                                    </div>
                                </li>
                            @endif
                        @endif
                        <!-- Dropdown -->
                        {{-- <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="{{ route('register') }}" id="navbardrop" data-toggle="dropdown">{{ __('Register') }}
                            </a>
                        </li> --}}
                         <!-- Authentication Links -->
                         @guest
                         {{-- <li class="nav-item"> 
                             <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                         </li> --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                
          
          {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <img src="bug.jpg" alt="" class="bug">
          </button> --}}

        {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ url('/') }}/genres" id="navbardrop" data-toggle="dropdown">
                    Marcas
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/') }}/brands_pages">Listar Marcas</a>
                        @if ( auth()->check() )
                            @if (auth()->user()->hasRole('Admin'))
                                <a class="dropdown-item" href="{{ url('/') }}/brands">Filtrar Marcas</a>                                  
                                <a class="dropdown-item" href="{{ url('/') }}/brand/new">Inserir Marca</a>
                            @endif
                        @endif
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul> --}}
        </div>
        <div class="menuBtns col-xs-12 col-sm-8 col-md-9 col-lg-4 px-0">
                <button class="hamb-button navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="">
                            <img class="hamb-img" src="{{url('img/hamburger_tr2')}}.png"> 
                        </span>
                    </button>
                <button class="btn btn-default px-0 bg-transparent" type="button";>
                        <a href="{{route('home')}}">
                            <img class="home-img">
                        </a>
                    </button>
                    <button class="btn btn-default px-0 bg-transparent" type="button";>
                        <a href="{{route('login')}}">
                            <img class="entrar-img">
                        </a>
                    </button>
                    <button class="btn btn-default px-0 bg-transparent" type="button";>
                        <a href="{{route('contato')}}">
                            <img class="contato-img">
                        </a>
                    </button>
                </div>
        
          @yield('test')
      </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="">
        <div class="container col-12  col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
            <div class=img-footer alt="Responsive image" >
                    <div class="row">
                            <div class="logoFooter text-center col-12">
                                <a href="{{route('home')}}">
                                    <img src="{{url('img/logo/ex3transp.png')}}" alt="logotipo" class="logoFooter">
                                </a>
                                <a href="https://www.facebook.com/desafieconquiste/" class="social"><i class="fab fa-facebook-square botaoFacebook"></i></a>
                                <a href="https://www.instagram.com/" class="social"><i class="fab fa-instagram botaoInstagram"></i></a>
                                <a href="https://twitter.com/" class="social"><i class="fab fa-twitter botaoTwitter"></i></a>
                                <a href="https://br.pinterest.com/" class="social"><i class="fab fa-pinterest-square botaoPinterest"></i></i></a>
                                <div class="text-center m-auto">&copy; <?php echo "Copyrights 2018. Desafie & Conquiste 2018 All Rights Reserved.";?></div>
                            </div>
                        </div>   
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
