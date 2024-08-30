<?php
  require_once 'cadastroModel.php';

  class CadastroController{
    public function create($data){
      $nome = isset($data['nome']) ? $data['nome'] : null;
      $data_nascimento = isset($data['data']) ? $data['data'] : null;
      $email = isset($data['mail']) ? $data['mail'] : null;
      $profissao = isset($data['profissao']) ? $data['profissao'] : null;
      $telefone = isset($data['telefone']) ? $data['telefone'] : null;
      $celular = isset($data['celular']) ? $data['celular'] : null;
      $celular_wpp = isset($data['checkWpp']) ? true : false;
      $notify_email = isset($data['notifyEmail']) ? true : false;
      $notify_sms = isset($data['notifySms']) ? true : false;
      
      $telefone = intval($telefone);
      $celular = intval($celular);
      
      if($data_nascimento != null){
        $data_nascimento = (string) $data_nascimento;
        
        $data_obj = DateTime::createFromFormat('dmY',$data_nascimento);
        if($data_obj){
          $data_formatada = $data_obj->format('Y-m-d');
        }
      
        if ($nome && $email) {
          $cadastroModel = new cadastroModel();
          if ($cadastroModel->cadastrarContato($nome, $data_formatada, $email, $profissao, $telefone, $celular, $celular_wpp, $notify_email, $notify_sms)) {
            echo "Contato cadastrado com sucesso!";
          } else {
            echo "Erro ao cadastrar contato.";
          }
        } else {
          echo "Por favor, preencha todos os campos.";
        }
      }
    }
    
    public function read(){
      $contatos = new CadastroModel;
      $stmt = $contatos->listarContatos();
      return json_encode($stmt);
    }
  }
?>
