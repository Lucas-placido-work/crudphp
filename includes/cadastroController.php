<?php
require_once 'cadastroModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
  $data_nascimento = isset($_POST['data']) ? $_POST['data'] : null;
  $email = isset($_POST['mail']) ? $_POST['mail'] : null;
  $profissao = isset($_POST['profissao']) ? $_POST['profissao'] : null;
  $telefone = isset($_POST['telefone']) ? (int) $_POST['telefone'] : null;
  $celular = isset($_POST['celular']) ? (int) $_POST['celular'] : null;
  $wpp = isset($_POST['checkWpp']) ? true : false;
  $notify_email = isset($_POST['notifyEmail']) ? true : false;
  $notify_sms = isset($_POST['notifySms']) ? true : false;


  if($data_nascimento != null){
    $data_nascimento = (string) $data_nascimento;

    $data_obj = DateTime::createFromFormat('dmY',$data_nascimento);
    if($data_obj){
      $data_formatada = $data_obj->format('Y-m-d');
    }
  }

  if ($nome && $email) {
    $cadastroModel = new cadastroModel();
    if ($cadastroModel->cadastrarContato($nome, $data_formatada, $email, $profissao, $telefone, $celular, $wpp, $notify_email, $notify_sms)) {
        echo "Contato cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar contato.";
    }
  } else {
    echo "Por favor, preencha todos os campos.";
  }
}
?>
