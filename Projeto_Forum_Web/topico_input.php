<?php 
require "funcoes.php";
require "credenciais.php";
require "Autenticacao.php";

//falta mysqli-inject       
if(!empty($_POST['titulo']) && !empty($_POST['questao'])){
       
            $conn = conexao();
            $titulo = mysqli_real_escape_string($conn,$_POST["titulo"]);
            $questao = mysqli_real_escape_string($conn,$_POST["questao"]);
            $erro = false;
            $id = $user_id;
            
            $data=date("Ymd"); $hora = date("h:i:s");
            $sql = "INSERT INTO topico (titulo, questao, usuario, data, hora) VALUES ('$titulo', '$questao', '$id', '$data', '$hora') ";
            if(!mysqli_query($conn, $sql)){
                $error_msg = mysqli_error($conn);
                $error = true;
                echo $error_msg;
       
            }        
        }
        else{
            $erro = true;
        }
        $sql = "SELECT * FROM topico WHERE (titulo='$titulo' and questao='$questao' and usuario='$id' and data='$data')";
        if ($result = mysqli_query($conn,$sql)) {
            $linhas = mysqli_num_rows($result);    
          
        }
                
            if($linhas!=0){
                 while ($linhas = mysqli_fetch_assoc($result)) {
                    $titulo = $linhas['titulo'];
                    $questao = $linhas['questao']; 
                    $id_topico = $linhas['id'];
                }
            }
        if (!$erro)
        header("Location: resposta.php?id=$id_topico");    
    ?>