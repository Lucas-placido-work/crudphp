<?php
require_once '../config/db.php';

class CadastroModel {
    private $conn;

    public function __construct() {
        $this->conn = getDbConnection();
    }

    public function cadastrarContato($nome, $data_nascimento, $email, $profissao, $telefone, $celular, $wpp, $notify_email, $notify_sms) {
        $query = "INSERT INTO contatos (nome, data_nascimento, email, profissao, telefone, celular, wpp, notify_email, notify_sms) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssiiiii", $nome, $data_nascimento, $email, $profissao, $telefone, $celular, $wpp, $notify_email, $notify_sms);
        
        if ($stmt->execute()) {
            $stmt->close();
            $this->conn->close();
            return true;
        } else {
            $stmt->close();
            $this->conn->close();
            return false;
        }
    }
}
?>
