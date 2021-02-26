<?php
    require "FAutenticacao.php";
    require_once "credenciais.php";
    require "funcoes.php";
    require "credenciais.php";
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
    <link rel="stylesheet" href="style\index.css">
    <title>Tópicos</title>
</head>
<body>
<div class="barra">
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="menu.php">FullStackOverFlow</a>
    <a class="navbar-text" href="#">Início</a>
    <a class="navbar-text" href="perfil.php?id=<?php echo $_SESSION['id'];?>">Pefil</a>
    <a class="navbar-text" href="criar_topico.php">Novo Tópico</a>
    <a class="navbar-text" href="logout.php">Sair</a>
    <form class="form-inline" method="GET" action="pesquisa.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Busca" name="pesquisa" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </nav>
  </div>

  <?php
    $conn = conexao();
    $sql = "SELECT * FROM topico";
        if ($result = mysqli_query($conn,$sql)) {
            $max = mysqli_num_rows($result);
          }
        $min = 1; $i=0;
        while($i < 11){
          $id_rand = rand($min, $max);
          $sql = "SELECT * FROM topico WHERE id=$id_rand";
          if ($result = mysqli_query($conn,$sql)) {
              $linhas = mysqli_num_rows($result);
              while ($linhas = mysqli_fetch_assoc($result)) {

                $id[$i] = $linhas['id'];
                $titulo[$i] = $linhas['titulo'];
                $questao[$i] = $linhas['questao'];
                $usuario[$i] = $linhas['usuario'];
                $data[$i] = $linhas['data'];
                $hora[$i] = $linhas['hora'];
                $i++;
              }
          }


    }$z=0;
    while ($z<11){
    $sql2 = "SELECT username FROM usuario WHERE id=$usuario[$z]";
            if ($result2 = mysqli_query($conn,$sql2)) {
                $linhas2 = mysqli_num_rows($result2);
                while ($linhas2 = mysqli_fetch_assoc($result2)) {
                  $autor[$z] = $linhas2['username'];
        }
      }
      $z++;
    }
  ?>

  <div class="list-group">
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
  <div class="d-flex w-100 justify-content-between">
    <h5 class="display-4">Tópicos:</h5>
  </div>
  </a>
  <?php $a=0; while ($a<$i){ ?>
  <a href="topico.php?id=<?php echo $id[$a]?>" class="list-group-item list-group-item-action flex-column align-items-start">
  <div class="d-flex w-100 justify-content-between">
    <h5 class="mb-1"><?php echo $titulo[$a];?></h5>
    <small class="text-muted">Data: <?php echo $data[$a];?></small>
  </div>
  <p style="justify-content: left;" class="mb-1"><?php echo $questao[$a];?></p>
  <small class="text-muted">Autor: <?php echo $autor[$a];?></small>
</a>
    <?php $a++; }?>

</div>
<nav aria-label="Page navigation example" style="margin-top: 10px;">
<ul class="pagination justify-content-center">
  <li class="page-item"><a class="page-link" href="menu.php?pagina=;?>">Anterior</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=1">1</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=2">2</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=3">3</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=4">4</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=5">5</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=6">6</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=7">7</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=8">8</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=9">9</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=10">10</a></li>
  <li class="page-item"><a class="page-link" href="menu.php?pagina=">Próximo</a></li>
</ul>
</nav>




        <script>

        </script>
        <script type="text/javascript" src="js/menu.js"></script>
    </div>
</body>
</html>
