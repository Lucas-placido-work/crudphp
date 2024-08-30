<?php
require_once(__DIR__ . '/../config/db.php');

class CadastroModel {
    private $conn;

    public function __construct() {
        $this->conn = getDbConnection();
    }

    public function cadastrarContato($nome, $data_nascimento, $email, $profissao, $telefone, $celular, $celular_wpp, $notify_email, $notify_sms) {
        $query = "INSERT INTO contatos (nome, data_nascimento, email, profissao, telefone, celular, celular_wpp, notify_email, notify_sms) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssiiiii", $nome, $data_nascimento, $email, $profissao, $telefone, $celular, $celular_wpp, $notify_email, $notify_sms);
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

    public function listarContatos(){
        $query = "SELECT * FROM contatos";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $contatos = array();
            $resultado = $stmt->get_result();
            while ($linha = $resultado->fetch_assoc()) {
                $contatos[] = $linha;
            }
            $stmt->close();
            $this->conn->close();
            return $contatos;
        } else {
            $stmt->close();
            $this->conn->close();
            return null;
        }
    }

    public function editarContato(){

    }

    public function removerContato(){
        
    }
}
?>
