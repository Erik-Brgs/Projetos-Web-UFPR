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
    <link rel="stylesheet" href="style\index.css">
    <title>Bem-Vindo!</title>
</head>
<body>
  <div class="barra">
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="menu.php">FullStackOverFlow</a>
    </nav>
    </div>

  <div style="width: 1842px; height: 920px; background: #1E90FF;" id="container">
    <div id="box">
        <br><h1 style="font-family: Georgia, Serif;"> Login</h1>
        <div class="form-group" id="entrada">
        <form action="login.php" method="POST">
			      E-mail:<input type="email" name="email" id="email" class="form-control">
            <img style="top: 29%; left: 90%;" id="imagem_erro" src=""  width=15 height=15>
            Senha:<input type="password" value="" class="form-control" name="senha" id="senha">
            <img style="top: 44%; left: 90%;" src="https://image.flaticon.com/icons/png/512/65/65000.png" id="olho" class="olho" width=15 height=15>
            <input type="button" value="Login" class="btn btn-danger btn-block" id="login_botao">
            <a href="registre.php" class="btn btn-success btn-block" id="botao_registro">Registrar</a>
        </form>
       </div>
    </div>
    </div>

    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>
