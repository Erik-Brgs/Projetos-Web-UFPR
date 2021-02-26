<?php
    require "funcoes.php";
    require "credenciais.php";
    require "Autenticacao.php";
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
    <title>Titulo do tópico</title>
</head>
<body>

  <div class="barra">
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="menu.php">FullStackOverFlow</a>
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

    <script type="text/javascript" src="js/topicos.js"></script>

    <?php
        $id = $_GET['id'];
        $conn = conexao();
        $sql = "SELECT * FROM topico WHERE id='$id'";
        if ($result = mysqli_query($conn,$sql)) {
            $linhas = mysqli_num_rows($result);
            }
            if($linhas!=0){
                 while ($linhas = mysqli_fetch_assoc($result)) {
                    $titulo = $linhas['titulo'];
                    $questao = $linhas['questao'];
                    $usuarios = $linhas['usuario'];
                }
            }else{
                echo "topico não encotrado.";
                exit();
            }


        $sql = "SELECT * FROM resposta WHERE topico=$id";
        if ($result = mysqli_query($conn,$sql)) {
            $linhas = mysqli_num_rows($result);
            }
            $i=0;
            if($linhas!=0){
                 while ($linhas = mysqli_fetch_assoc($result)) {
                    $texto[$i] = $linhas['texto'];
                    $posicao[$i] = $linhas['posicao'];
                    $usuario[$i] = $linhas['usuario'];
                    $data[$i] = $linhas['data'];
                    $hora[$i] = $linhas['hora'];
                    $i++;
                }
            }else{
                header ("Location: resposta.php?id=$id");
                exit();
            }

    ?>

    <div class="list-group">
  <a style="border-top-left-radius: unset; border-top-right-radius: unset;"href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="display-4">Tópicos:</h5>
    </div>
    </a>
    <a class="list-group-item list-group-item-action flex-column align-items-start">
      <div style="justify-content: flex-end!important;" class="d-flex w-100 justify-content-between">
        <small class="text-muted">Data: <?php echo $data[0];?> Hora: <?php echo $hora[0];?></p></small>
      </div>
      <h2><?php echo $titulo; ?></h2>
      <h5><p><?php echo $questao;?></p></h5>
      <small href="perfil.php?id=<?php echo $usuario[0];?>">Autor: <?php $result = mysqli_query($conn,"SELECT * from usuario WHERE id=$usuario[0]");  $linhas = mysqli_num_rows($result);
      while ($linhas = mysqli_fetch_assoc($result)) {echo $linhas['username'];}?></small>
      <button style="font-size: 0.8rem; display: flex; margin-top: 4px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Responder</button>
      <hr class="my-4">

<?php $a = 0; while($a<$i) {?>
  <small class="text-muted">Data: <?php echo $data[$a];?> Hora: <?php echo $hora[$a];?></p></small>
  <small href="perfil.php?id=<?php echo $usuario[$a];?>">Autor: <?php $result = mysqli_query($conn,"SELECT * from usuario WHERE id=$usuario[$a]");  $linhas = mysqli_num_rows($result);
  while ($linhas = mysqli_fetch_assoc($result)) {echo $linhas['username'];}?></small>
    <h5 class="text-muted"><?php echo $texto[$a];?></h5>
    <hr class="my-4">
    <?php $a++;
    }?>
</a>
</div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Resposta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <div style="margin-top: 1rem;" class="form-group">
                <form action="resposta_php.php?id=<?php echo $id;?>" method="POST">
                    <input style="width: 450px; height: 150px; margin-left: 24px; border-radius: 0.25rem;" type="text" name="resposta" id="resposta">
                    <input style="margin-left: 417px; margin-top: 10px;" class="btn btn-primary" type="submit" value="Enviar">
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
