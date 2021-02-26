<?php
require 'FAutenticacao.php';
require 'funcoes.php';
require 'credenciais.php';
    $erro = false;
    $i=0;
    $buscar = $_GET['pesquisa'];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql="SELECT * FROM topico WHERE titulo like'%$buscar%'";
    $resultado_sql = mysqli_query($conn, $sql);
	while($rows_cursos = mysqli_fetch_array($resultado_sql)){
        $pes[$i] = $rows_cursos['titulo'];
        $pes_id[$i] = $rows_cursos['id'];
        $i++;
    }
    if (!$pes[0]) $erro = true;
?>
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
    <link rel="stylesheet" href="style.css">
    <title>pesquisa <?php echo $buscar ?></title>
</head>
<body>
  <div class="barra">
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="menu.php">FullStackOverFodaC</a>
      <a class="navbar-text" href="#">Início</a>
      <a class="navbar-text" href="perfil.php?id=<?php echo $_SESSION['id'];?>">Pefil</a>
      <a class="navbar-text" href="criar_topico.php">Novo Tópico</a>
      <a class="navbar-text" href="logout.php">Sair</a>
      <form class="form-inline" method="POST" action="pesquisa.php">
        <input class="form-control mr-sm-2" type="search" placeholder="Busca" name="pesquisa" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </nav>
    </div>

    <div class="list-group">
      <a style="border-top-left-radius: unset; border-top-right-radius: unset;"href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="display-4">Resultado da Busca:</h5>
          </div>
      </a>
    <?php if($erro) { echo "nada encontrado"; }?>
    <?php $a=0; while ($a<$i){ ?>
    <a href="topico.php?id=<?php echo $pes_id[$a]; ?>"class="list-group-item list-group-item-action flex-column align-items-start"> <?php echo $pes[$a]; ?>
  </a>
    <?php $a++; }?>
</body>
</html>
