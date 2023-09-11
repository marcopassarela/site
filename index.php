<?php
// Conecte-se ao banco de dados (substitua com suas configurações)
$servername = "localhost";
$username = "root";
$password = "Marco@5213";
$dbname = "trabalhe_conosco";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

// Receba os dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$dataNascimento = $_POST['data_nascimento'];

// Insira os dados no banco de dados
$sql = "INSERT INTO Pessoas (Nome, Telefone, Email, DataNascimento) VALUES ('$nome', '$telefone', '$email', '$dataNascimento')";

if ($conn->query($sql) === TRUE) {
    echo "Dados enviados com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

// Feche a conexão com o banco de dados
$conn->close();
?>
