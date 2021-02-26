<?php
session_start();
require "funcoes.php";
require "index.php";
require "Autenticacao.php";
$error = false;
$success = false;
$email=$_POST['email'];
$senha=$_POST['senha'];
if(isset($_POST['email']) && isset($_POST['senha']) ) {
    $email=$_POST['email'];
    $senha=$_POST['senha'];        
    $conn = conexao();
        $sql="SELECT * FROM usuario WHERE email='".$email."'";
            if(mysqli_query($conn, $sql)){
                $sucess=true;
            }else{
                $error_msg = mysqli_error($conn);
                $error = true;
            }
        if ($result = mysqli_query($conn,$sql)) {
            $linhas = mysqli_num_rows($result);    
            }
                
            if($linhas!=0){
                 while ($linhas = mysqli_fetch_assoc($result)) {
                    $bd_email = $linhas ['email'];
                    $bd_senha = $linhas['senha'];
                    $bd_username= $linhas['username'];
                    $bd_id= $linhas['id'];
                    
                }if(md5($senha)==$bd_senha){
                    mysqli_free_result($result);
                    $_SESSION["username"]=$bd_username;
                    $_SESSION["id"]=$bd_id;
                    $_SESSION["email"]=$bd_email;
                    header("Location: menu.php");
            }else {
                echo "Senha incorreta.";
                mysqli_free_result($result);
                header("Location: index.php?a=1");
            }
        }else{ 
           echo"Não Encontrado email";
           mysqli_free_result($result);
           header("Location: index.php?a=2");
        }
    } else{
        echo "Ambos email e senha devem ser preenchidos.";
        header("Location: index.phpa=3"); 
    }

desconectar($conn);