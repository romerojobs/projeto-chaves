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
    <div class="container-fluid"  id = "header" style = "background-color:rgb(217,217,217)">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-2"><img src="IFPB ícone cis.png" class = "p-1" style = "height:60px ;width:55px"></div>
            <div class="col-10"><h2>Sistema de chaves IF</h2></div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center g-2">
        <div class="col-8 text-center">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col"><h1 class = "p-5">Login</h1></div>
            </div>
            <div class="row justify-content-center align-items-center g-2">
                <div class="col"><form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="SIAPE" id="siape" class="form-control" name="siape" required
                                    autofocus>
                                @if ($errors->has('siape'))
                                <span class="text-danger">{{ $errors->first('siape') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="SENHA" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Continuar logado
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Entrar</button>
                            </div>
                        </form></div>
            </div>
        </div>
    </div>

</body>
</html>