<?php 
require_once 'db.php';

function inserirUsuario($nome, $email) {
    $conn = getDbConnection();

    // Usando mysqli
    $stmt = $conn->prepare("INSERT INTO contatos (nome, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nome, $email);
    $stmt->execute();
    $stmt->close();
    $conn->close();

}

?>