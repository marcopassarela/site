<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "seja_nosso_aluno";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$pacote = $_POST['pacote'];
$cursos = $_POST['cursos'];

$sql = "INSERT INTO formulario (nome, telefone, email, pacote, cursos)
VALUES ('$nome', '$telefone', '$email', '$pacote', '$cursos')";

if ($conn->query($sql) === TRUE) {
  echo "Novo registro criado com sucesso";
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>