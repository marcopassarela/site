<?php
// Defina suas configurações de conexão com o banco de dados
$servername = "localhost"; // Nome do servidor MySQL
$username = "root"; // Nome de usuário do MySQL
$password = "1234"; // Senha do MySQL
$dbname = "trabalhe_conosco"; // Nome do banco de dados

// Crie uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

// Verifique se a solicitação foi feita via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $dataNascimento = $_POST['data_nascimento'];

    // Processar o arquivo de currículo enviado
    $nomeArquivo = $_FILES['curriculo']['name'];
    $localArquivo = $_FILES['curriculo']['tmp_name'];

    // Mova o arquivo para um diretório de destino (por exemplo, 'uploads')
    $diretorioDestino = 'uploads/';
    $caminhoCompleto = $diretorioDestino . $nomeArquivo;

    if (move_uploaded_file($localArquivo, $caminhoCompleto)) {
        // Inserir os dados no banco de dados, incluindo o caminho do currículo
        $sql = "INSERT INTO pessoas (nome, telefone, email, data_nascimento, curriculo) VALUES ('$nome', '$telefone', '$email', '$dataNascimento', '$caminhoCompleto')";

        if ($conn->query($sql) === TRUE) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $conn->error;
        }
    } else {
        echo "Erro ao fazer o upload do currículo.";
    }

    // Feche a conexão com o banco de dados
    $conn->close();
}
?>