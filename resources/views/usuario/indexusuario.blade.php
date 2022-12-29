<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaves</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container-fluid"  id = "header" style = "background-color:rgb(217,217,217); display:inline-flex">
        <div class="col-4 d-flex flex-row align-items-center">
            <img src="IFPB ícone cis.png" class = "p-1" style = "height:60px ;width:55px">
            <h2 class="ml-4" >Sistema Chaves IF</h2>
        </div>

        <div class="col-6 d-flex flex-row align-items-center">
            <a href="index.html" style = "font-size: 3vh;" class="ml-5">Início</a>
        </div>

        <div class="col-2 d-flex flex-row align-items-center">
        @guest
                    @else
                        <a class="nav-link" style = "font-size:3vh;" href="{{ route('signout') }}">Logout</a>
                    @endguest
        </div>

    </div>

    <div class = "container-fluid">
        <div class="row justify-content-center align-items-center p-0">
            <div class="col-9">
                <h3 class = "p-4">Informações do usuário</h3>
                    <div class = "p-4">
                        <h6>Nome: {{$user->nome}}</h6>
                        <h6>SIAPE: {{$user->siape}}</h6>
                        <h6>Email: {{$user->email}}</h6>
                        <h6>Telefone institucional: {{$user->telefoneinstitucional}}</h6>
                        <h6>Telefone celular: </h6>
                        <h6 class = "mt-4">Setor: {{$user->setor}}</h6>
                        <h6>Cargo: {{$user->cargo}}</h6>
                    </div>
                    <div class = "p-3">
                        <a href="">Trocar senha</a>
                        <a href="{{ route('usuariopedidos') }}" class = 'ml-3'>Ver histórico de pedidos</a>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>