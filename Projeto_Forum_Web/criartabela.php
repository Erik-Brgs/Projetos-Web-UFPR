<?php
require 'credenciais.php';
require 'funcoes.php';
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE DATABASE $dbname";
if (mysqli_query($conn, $sql)) {
    echo "<br>Banco de dados criado com sucesso!<br>";
} else {
    echo "<br>Erro ao criar o banco de dados: " . mysqli_error($conn);
}
$sql = "USE $dbname";
if (mysqli_query($conn, $sql)) {
    echo "<br>base de dados carregada<br>";
} else {
    echo "<br>Erro ao usar a base de dados " . mysqli_error($conn);
}
// 1º TABELA
$sql = "CREATE TABLE usuario(
    id int(6) AUTO_INCREMENT PRIMARY KEY,
    username varchar(50) NOT NULL,
    senha varchar(999) NOT NULL,
    email varchar(60) NOT NULL UNIQUE KEY,
    dt_cadastro date NOT NULL,
    n_publ INT
);";
if (mysqli_query($conn, $sql)) {
    echo "<br>Tabela criada com sucesso! <br>";
} else {
    echo "<br>Erro na criação do banco: " . mysqli_error($conn);
}
//2º TABELA:
$sql = "CREATE TABLE topico (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(999) NOT NULL,
    questao VARCHAR(999) NOT NULL,
    usuario INT(6),
    data DATE NOT NULL,
    hora char(8) NOT NULL,
    CONSTRAINT fk_usuario FOREIGN KEY (usuario) REFERENCES usuario(id)
);";

  if (mysqli_query($conn, $sql)) {
      echo "<br>Tabela criada com sucesso! <br>";
  } else {
      echo "<br>Erro na criação do banco: " . mysqli_error($conn);
  }
  //3º table
  $sql = "CREATE TABLE resposta (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    texto VARCHAR(999) NOT NULL,
    topico INT(6) NOT NULL,
    usuario INT(6) NOT NULL,
    data DATE NOT NULL,
    hora char(8) NOT NULL,
    posicao int NOT NULL,
    CONSTRAINT fk_topico FOREIGN KEY (topico) REFERENCES topico(id)
);";

  if (mysqli_query($conn, $sql)) {
      echo "<br>Tabela criada com sucesso! <br>";
  } else {
      echo "<br>Erro na criação do banco: " . mysqli_error($conn);
  }

desconectar($conn);
?>
