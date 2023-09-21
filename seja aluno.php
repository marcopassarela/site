<?php
// Conexão com o banco de dados (substitua as informações com as suas)
$servidor = "localhost";
$usuario = "root";
$senha = "1234";
$banco = "seja_nosso_aluno";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verifica a conexão
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verifique se os campos do formulário foram enviados
if (isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['pacote']) && isset($_POST['cursos'])) {
    // Obtenha os valores dos campos
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $pacote = $_POST['pacote'];
    $cursos = $_POST['cursos'];

    // Inserir dados no banco de dados
    $sql = "INSERT INTO formulario (nome, telefone, email, pacote, cursos)
            VALUES ('$nome', '$telefone', '$email', '$pacote', '$cursos')";

    if (mysqli_query($conexao, $sql)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conexao);
    }
} else {
    echo "Campos do formulário não foram enviados corretamente.";
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>
