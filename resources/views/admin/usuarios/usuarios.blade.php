<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Sistema de Chaves</title>
    <link rel="stylesheet" href="/css/styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
    <!-- CABEÇALHO -->
       <div class="container border"  id = "header" style = "width:998px;background-image:url(background.png);">   
            <div class="row" style = "width:100%;">
                <div class = "col-2">
                    <img src="logo_campus.png" class = "p-3">
                </div>
                <div class = "col-3 offset-5">
                    <h1 class = "mt-4">Sistema de chaves</h1>
                </div>
            </div>
        <!-- LISTA DE OPÇÕES -->
        <div class="row align-items-center justify-content-center" style = "background-color:#dff0d8; width:998px;height:12vh;">
            <div class = "col">
                <!-- LOGIN -->
                <a  href="{{route('dashboard')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Início</a>
            </div>
            <div class = "col">
                <!-- Adicionar usuário -->
                <a  href="{{route('registration')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Adicionar usuário</a>
            </div>
            <div class = "col">
                <!-- Trocar senha -->
                <a  href="{{route('trocarSenhaUsuario')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Trocar senha</a>
            </div>
            <div class = "col">
                <!-- Logout -->
                <a  href="{{route('logout')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Sair</a>
            </div>
        </div>
    </div>

    <!-- LISTA DE USUÁRIOS -->
    <div class="container text-center mt-3 " style = "width:998px">
            <h3>Lista de usuários</h3>
            <table class="table mt-3">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">SIAPE</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone celular</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Setor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <th scope="row">{{$user->nome}}</th>
                    <td>{{$user->siape}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->telefonecelular}}</td>
                    <td>{{$user->cargo}}</td>
                    <td>{{$user->setor}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
    </div>
</body>
</html>