<?php
  require_once 'contatoModel.php';

  class ContatoController{
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
      
      $telefone = intval($data_nascimento);
      $telefone = intval($telefone);
      $celular = intval($celular);
      
      if($data_nascimento != null){
        $data_nascimento = (string) $data_nascimento;
        
        $data_obj = DateTime::createFromFormat('dmY',$data_nascimento);
        if($data_obj){
          $data_formatada = $data_obj->format('Y-m-d');
        }
      
        if ($nome && $email) {
          $contatoModel = new ContatoModel();
          if ($contatoModel->cadastrarContato($nome, $data_formatada, $email, $profissao, $telefone, $celular, $celular_wpp, $notify_email, $notify_sms)) {
            $retorno = json_encode("Contato cadastrado com sucesso!"); 
            echo $retorno;
          } else {
            $retorno = json_encode("Erro ao cadastrar contato.");
            echo $retorno;
          }
        } else {
          $retorno = json_encode("Por favor, preencha nome e email");
          echo $retorno;
        }
      }
    }
    
    public function read(){
      $contatos = new ContatoModel;
      $stmt = $contatos->listarContatos();
      return json_encode($stmt);
    }

    public function update($data){
      $id = isset($data['id']) ? $data['id'] : null;
      if(!$id){
        echo "Falha ao tentar atualizar";
        return false;
      }
      $nome = isset($data['nome']) ? $data['nome'] : null;
      
      $data_nascimento = isset($data['data']) ? $data['data'] : null;
      if($data_nascimento != null){
        $data_nascimento = (string) $data_nascimento;
        
        $data_obj = DateTime::createFromFormat('dmY',$data_nascimento);
        if($data_obj){
          $data_formatada = $data_obj->format('Y-m-d');
        }
      }

      $email = isset($data['mail']) ? $data['mail'] : null;
      $profissao = isset($data['profissao']) ? $data['profissao'] : null;
      $telefone = isset($data['telefone']) ? $data['telefone'] : null;
      $celular = isset($data['celular']) ? $data['celular'] : null;
      $celular_wpp = isset($data['checkWppEdit']) ? true : false;
      $notify_email = isset($data['notifyEmailEdit']) ? true : false;
      $notify_sms = isset($data['notifySmsEdit']) ? true : false;
      
      $contatos = new ContatoModel;
      if($nome && $email){
        if($contatos->editarContato($id,$nome, $data_formatada, $email, $profissao, $telefone, $celular, $celular_wpp, $notify_email, $notify_sms)){
          $retorno = json_encode("Contato editado com sucesso!"); 
          echo $retorno;
        }
        else{
          $retorno = json_encode("Falha ao tentar editar contato!"); 
          echo $retorno;
        }
      }
      else{  
        $retorno = json_encode("Nome e email não podem estar vazios!"); 
        echo $retorno;
      }
    }

    public function delete($id){
      $contatoModel = new ContatoModel();
      if($contatoModel->removerContato($id)){
        $retorno = json_encode("Contato removido com sucesso!"); 
        echo $retorno;
      }
      else{
        $retorno = json_encode("Falhou ao tentar remover contato!"); 
        echo $retorno;
      }
      

    }
  }
?>
