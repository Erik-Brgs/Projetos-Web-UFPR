<?php
require "funcoes.php";
require "registre.php";
$error = false;
$success = false;
$name = $email = "";
$data=date("Ymd");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["nome"]) && isset($_POST["email1"]) && isset($_POST["email2"]) && isset($_POST["senha1"]) && isset($_POST["senha2"])) {
    $conn = conexao();
    $name = mysqli_real_escape_string($conn,$_POST["nome"]);
    $email = mysqli_real_escape_string($conn,$_POST["email1"]);
    $confirm_email = mysqli_real_escape_string($conn,$_POST["email2"]);
    $password = mysqli_real_escape_string($conn,$_POST["senha1"]);
    $confirm_password = mysqli_real_escape_string($conn,$_POST["senha2"]);
    if ($password == $confirm_password || $email == $confirm_email ) {
      $password = md5($password);
      
      $sql = "INSERT INTO $table_users1
              (username, email, senha,dt_cadastro) VALUES
              ('$name', '$email', '$password','$data')";
      if(mysqli_query($conn, $sql)){
        $success = true;
      }
      else {
        $error_msg = mysqli_error($conn);
        $error = true;
      }
    }
    if ($name=="" || $password==""){
      $error_msg ="Nome e Senha devem ser preenchidos";
      header ("Location: registre.php?a=4");   
      $error=true;
    }
    
    if($password != $confirm_password || $email != $confirm_email ){
      $error_msg = "Senha ou Email não conferem com a confirmação.";
      header ("Location: registre.php?a=3");
      $error = true;
      
    }
  }
  else {
    $error_msg = "Por favor, preencha todos os dados.";
    header ("Location: registre.php?a=2");
    $error = true;
  }
if($success){
 echo "Usuário .$name  criado com sucesso!";
 header ("Location: registre.php?a=1");
}
desconectar($conn);
}
/*  
}*/
?> 
