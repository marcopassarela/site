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

// Verifique se a solicitação foi feita via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
    } else {
        $nome = ''; // Ou outra ação apropriada se 'nome' não estiver definido
    }

    if (isset($_POST['telefone'])) {
        $telefone = $_POST['telefone'];
    } else {
        $telefone = ''; // Ou outra ação apropriada se 'telefone' não estiver definido
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = ''; // Ou outra ação apropriada se 'email' não estiver definido
    }

    if (isset($_POST['data_nascimento'])) {
        $dataNascimento = $_POST['data_nascimento'];
    } else {
        $dataNascimento = ''; // Ou outra ação apropriada se 'data_nascimento' não estiver definido
    }

    // Insira os dados no banco de dados
    $sql = "INSERT INTO pessoas (Nome, Telefone, Email, DataNascimento) VALUES ('$nome', '$telefone', '$email', '$dataNascimento')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados enviados com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    // Feche a conexão com o banco de dados
    $conn->close();
}
?>
