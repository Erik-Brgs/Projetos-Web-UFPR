<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style/registre.css">
    <title>Registro</title>
</head>
<body>
  <div class="barra">
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="menu.php">FullStackOverFlow</a>
    </nav>
    </div>

    <div style="width: 1842px; height: 920px;" id="container">
      <div id="box1" >
      <h1 style="margin-top: 10px;">Registro</h1>
    <div class="form-group" id="entrada">
    <form action="verifica.php" method="POST">
        E-mail <input type="email" name="email1" class="form-control" id="email1"> <img id="imagem_erro_email1" src=""  width=15 height=15> <br>
        confirmação de Email<input type="email" name="email2" class="form-control" id="email2"> <img id="imagem_erro_email2" src=""  width=15 height=15> <br>
        Nome do usuário: <input type="text" name="nome" class="form-control" id="nome"><img id="imagem_erro_usuario" src=""  width=15 height=15><br>
        senha: <input type="password" name="senha1" class="form-control" id="senha1"><img id="imagem_erro_senha1" src=""  width=15 height=15> <br>
        confirmação de senha: <input type="password" name="senha2" class="form-control" id="senha2"><img id="imagem_erro_senha2" src=""  width=15 height=15> <br>
        <input type="button" value="Registrar" id="botao_registro" class="btn btn-danger btn-block">

    </form>
    </div>
    </div>
    <script type="text/javascript" src="js/registro.js"></script>
</body>
</html>
