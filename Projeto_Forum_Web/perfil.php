<?php
    require "FAutenticacao.php";
    require_once "credenciais.php";
    require "funcoes.php";
    $i=0;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style\index.css">
    <title>Perfil <?php echo $id; ?></title>
</head>
<body>

  <div class="barra">
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="menu.php">FullStackOverFlow</a>
      <a class="navbar-text" href="menu.php">Início</a>
      <a class="navbar-text" href="perfil.php?id=<?php echo $_SESSION['id'];?>">Pefil</a>
      <a class="navbar-text" href="criar_topico.php">Novo Tópico</a>
      <a class="navbar-text" href="logout.php">Sair</a>
      <form class="form-inline" method="POST" action="pesquisa.php">
        <input class="form-control mr-sm-2" type="search" placeholder="Busca" name="pesquisa" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </nav>
    </div>


    <p>
    <?php
        if ($user_id){
          $conn = conexao();
          $pesquisapub=mysqli_query($conn,"SELECT * FROM topico where usuario='".$user_id."'");
            $linhas1=mysqli_num_rows($pesquisapub);

            if (mysqli_num_rows($pesquisapub)!=0){
              while ($linha1=mysqli_fetch_array($pesquisapub)){
                $lista_usuario[$i]=$linha1['titulo'];
                $lista_usuario_id[$i]=$linha1['id'];
                $i++;



              }
            }




            $pesquisa=mysqli_query($conn,"SELECT * FROM usuario WHERE id='".$user_id."'");
            $linhas=mysqli_num_rows($pesquisa);

            if (mysqli_num_rows($pesquisa)!=0){
                while ($linha=mysqli_fetch_assoc($pesquisa)){
                    $user = $linha['username'];
                    $cadastro = $linha['dt_cadastro'];
                    $email = $linha['email'];
                    $n_publi = $linhas1;
                 }
            } else {
                    echo "Erro";
            }
        }else {
           header("Location: menu.php");
        }
        desconectar($conn);

    ?>
    <div class="jumbotron">
      <h1 style="display: inline-block;" class="display-4"><?= $user ?></h1>
      <p style="display: block;" class="lead">Membro desde: <?= $cadastro ?></p>
      <p style="display: block;" class="lead">Email: <?= $email ?></p>
      <a class="btn btn-primary btn-lg" href="logout.php" role="button">Sair</a>
      <hr class="my-4">
      <h2 style="display: inline-block;">Publicações:</h2>
      <h3 style="display: inline-block;"><?= $n_publi ?></h1><br>
      <?php $a=0; while ($a<$i){ ?>
        <div style="margin-top: 5px;" class="">
          <h6 style="display: inline-flex;"><?php echo $lista_usuario[$a]; ?></h6>
        <a style="background: red; font-size: 0.7rem; display: unset; width: 60px; height: 30px;" class="btn btn-primary btn-lg" href="deletar_topico.php?id=<?php echo $lista_usuario_id[$a];?>" role="button">Deletar</a><br>
        </div>
      <?php $a++; }?>


    </div>

    <script type="text/javascript" src="js/perfil.js"></script>
</body>
</html>
