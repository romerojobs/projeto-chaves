<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/custom-registration" method="get">
        @csrf
        <input type="text" name="nome" id="nome">
        <input type="text" name="siape" id="siape">
        <input type="text" name="password" id="password">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>