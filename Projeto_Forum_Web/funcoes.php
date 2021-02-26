<?php
require "credenciais.php";
function conexao(){
    global $servername, $username, $dbname, $password;
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return ($conn);
}
function desconectar($conn){
    mysqli_close($conn);
}
?>