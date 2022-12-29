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
        <img src="IFPB ícone cis.png" class = "p-1" style = "height:60px ;width:55px">
        <h2 class="m-2" >Sistema Chaves IF</h2>
    </div>

    <div class="row justify-content-center align-items-center g-2">
        <div class="col-12 text-center">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Chave</th>
                    <th scope="col">Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chaves as $chave)
                    <tr>
                    <th scope="row">{{$chave->id}}</th>
                    <td>{{$chave->nomelab}}</td>
                    <td><a href="detalhes_chave.html" class="col"><img src="detalhes.jfif" style="height:30px ;width:30px"/></a></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>

        <div class="col-12 m-2 text-center" style = "background-color:rgb(231,226,226)">
            <div class="row justify-content-center align-items-center g-2">
                <a href="{{route('dashboard')}}" class="col">Inicio</a>
            </div>
            <div class="row justify-content-center align-items-center g-2">
                <a href="{{route('adicionarchave')}}" class="col">Adicionar Chave</a>
            </div>
        </div>

    </div>

</body>
</html>