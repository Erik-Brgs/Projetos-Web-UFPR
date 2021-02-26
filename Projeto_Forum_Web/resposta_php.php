<?php
require "funcoes.php";
require "credenciais.php";
require "FAutenticacao.php";


   if (isset($_GET['id']) && isset($_POST['resposta'])){
        $texto = $_POST['resposta'];
        $topico = $_GET['id'];
        $usuario = $user_id; 
        $data=date("Ymd");
        $hora = date("h:i:s");

        
        $conn = conexao();
        $sql = "SELECT * FROM resposta WHERE topico = $topico";
        $result = mysqli_query($conn,$sql);
        $linhas = mysqli_num_rows($result);  
        $posicao = $linhas + 1;
        echo $posicao;
        
        
       
        
        $sql = "INSERT INTO $table_users3
              (texto, topico, usuario,data, hora, posicao) VALUES
              ('$texto',$topico, $usuario,'$data', '$hora', $posicao)";
      if(mysqli_query($conn, $sql)){
        $success = true;
      }
      else {
        $error_msg = mysqli_error($conn);
        $error = true;
        echo "$error_msg";
        exit();
      }
      header("Location: topico.php?id=$topico");
   }else{
    echo "não foi";
   }
?>