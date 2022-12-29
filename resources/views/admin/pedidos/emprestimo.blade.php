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
        <div class="col-12 m-2 text-center">
            <h3 class="m-3" >Emprestimo</h3>
            <form action="storepedido" method="get">
                <div class="form-group">
                    <label for="chave" class="form-label">Qual Chave?</label>
                    <input name="nomechave" id="nomechave" class="form-control">
                </div>
                <div class="form-group">
                    <label for="chave" class="form-label">Qual SIAPE/Matricula?</label>
                    <input name="keyusuario" id="keyusuario" class="form-control">
                </div>
                <div class="form-group">
                    <label for="chave" class="form-label">Digite a senha do usuário:</label>
                    <input name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="chave" class="form-label">Qual controle de ar condicionado você usará?: </label>
                    <input name="controle" id="controle" class="form-control">
                </div>
                <div class="form-group">
                    <label for="chave" class="form-label">Caso você  leve algum material extra, digite aqui: </label>
                    <input name="material_extra" id="material_extra" class="form-control">
                </div>
                <input type="submit" value="Enviar">
            </form>
           
        </div>
    </div>

    <div class="col-12 text-center" style = "background-color:rgb(231,226,226)">
        <div class="row justify-content-center align-items-center g-2 m-2">
            <a href="{{route('dashboard')}}" class="col">Início</a>
        </div>
    </div>

</body>
</html>