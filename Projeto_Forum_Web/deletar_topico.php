<?php 
require "funcoes.php";
require "FAutenticacao.php";

$id = $_GET['id']; //contem o id da publ que será apagada.
if ($id != ""){
        $conn = conexao();
        $sql = "SELECT * FROM topico WHERE id='$id'";
        if ($result = mysqli_query($conn,$sql)) {
            $linhas = mysqli_num_rows($result);
            }
            if($linhas!=0){
                 while ($linhas = mysqli_fetch_assoc($result)) {
                    $usuario = $linhas['usuario'];
                }
            }else{
                $erro = true;
                $erro_msg = "topico não encotrado.";
            }
if ($user_id == $usuario){
    $sql = "DELETE FROM resposta WHERE topico=$id;";
    mysqli_query($conn,$sql);
    $sql = "DELETE FROM topico WHERE id=$id;";
    mysqli_query($conn,$sql);
}else{
    $erro_msg = "voce so pode deletar topicos criado por voce mesmo";
    $erro = true;
}

}else{
    $erro_msg = "Voce precisa passar um topico para ser deletado.";
    $erro = true;
}
header ("Location: perfil.php?id=$id");
?>