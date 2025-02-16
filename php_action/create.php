<?php
// Inicia a sessão
session_start();

// Conexão com o banco de dados
require_once 'db_connect.php';

if (isset($_POST['btn-cadastrar'])):
    // Escapa os dados para evitar SQL injection
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $endereco = mysqli_escape_string($connect, $_POST['endereco']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);

    // Validações
    $erros = [];

    // Validação do Nome
    if (empty($nome)) {
        $erros[] = "O campo Nome é obrigatório.";
    }

    // Validação do Email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "O campo Email é inválido.";
    }

    // Validação do Endereço
    if (empty($endereco)) {
        $erros[] = "O campo Endereço é obrigatório.";
    }

    // Validação do Telefone
    $telefone = preg_replace('/[^0-9]/', '', $telefone); // Remove caracteres não numéricos
    if (strlen($telefone) < 10 || strlen($telefone) > 11) {
        $erros[] = "O campo Telefone é inválido. Deve conter 10 ou 11 dígitos.";
    }

    // Se houver erros, exibe as mensagens
    if (!empty($erros)) {
        $_SESSION['mensagem'] = implode("<br>", $erros);
        $_SESSION['tipo_mensagem'] = "red";
        header('Location: ../adicionar.php');
        exit();
    }

    // Insere os dados no banco de dados
    $sql = "INSERT INTO contatos (nome, email, endereco, telefone) VALUES ('$nome', '$email', '$endereco', '$telefone')";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Contato cadastrado com sucesso!";
        $_SESSION['tipo_mensagem'] = "green";
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar contato.";
        $_SESSION['tipo_mensagem'] = "red";
    }

    header('Location: ../index.php');
    exit();
endif;
?>