<?php

$bdhost = "localhost";
$bdusuario = "root";
$bdsenha = "";
$baseDados = "findsports";

// Cria a conexÃ£o
//mySQLi, ORIENTADA A OBJETOS
$conn = new mysqli($bdhost, $bdusuario, $bdsenha, $baseDados);
$conn->set_charset('utf8');
// Verifica conexÃ£o
if ($conn->connect_error) {
    die("ConexÃ£o ao MySQL falhou: " . $conn->connect_error);
}
if (isset($_POST['login']) && isset($_POST['senha'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE login=? AND senha=?");
    $stmt->bind_param('ss', $login, $senha);
    $stmt->execute();
    $result = $stmt->get_result();
    $aux = $result->fetch_assoc();
    $_SESSION['login'] = $aux['login'];
    $_SESSION['nome'] = $aux['nome'];
    $_SESSION['id'] = $aux['id'];
    $_SESSION['senha'] = $aux['senha'];
    $stmt->close();
    header("Location:?p=home");
}
if (isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['nome']) && isset($_POST['iscad'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    if ($_POST['iscad'] == 'cadastro') {
        $stmt = $conn->prepare("INSERT INTO users VALUES (NULL,?,?,?)");
        $stmt->bind_param('sss', $login, $senha, $nome);
        if (!$stmt->execute()) {
            echo "Falha ao cadastrar! <br>Erro: $stmt->error";
        } else {
            $result = $stmt->get_result();
            $aux = $result->fetch_assoc();
            $_SESSION['login'] = $aux['login'];
            $_SESSION['nome'] = $aux['nome'];
            $_SESSION['id'] = $aux['id'];
            $_SESSION['senha'] = $aux['senha'];
            header("Location:?p=home");
            $stmt->close();
        }
    }
} elseif (isset($_POST['iscad'])) {
    if ($_POST['iscad'] == 'alterar') {
        $id = $_POST['id'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $stmt = $conn->prepare("UPDATE users SET nome=?, senha=? WHERE id=?");
        $stmt->bind_param('ssi', $nome, $senha, $id);
        if (!$stmt->execute()) {
            echo "Falha na atualização! <br>Erro: $stmt->error";
        } else {
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header("Location:?p=home");
            $stmt->close();
        }
    }
}