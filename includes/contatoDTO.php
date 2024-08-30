<?php
class Contato {
  private string $nome;
  private DateTime $data_nascimento;
  private string $email;
  private int $celular;

  public function __construct(
    string $nome, 
    DateTime $data_nascimento, 
    string $email, 
    int $celular, 
  ) {
    $this->nome = $nome;
    $this->data_nascimento = $data_nascimento;
    $this->email = $email;
    $this->celular = $celular;
  }

  public function getNome(): string {
    return $this->nome;
  }

  public function getDataNascimento() {
    return $this->data_nascimento;
  }

  public function getEmail(): string {
    return $this->email;
  }

  public function getCelular(): int {
    return $this->celular;
  }

  public function setNome(string $nome): void {
    $this->nome = $nome;
  }

  public function setDataNascimento($data_nascimento): void {
    $this->data_nascimento = $data_nascimento;
  }

  public function setEmail(string $email): void {
    $this->email = $email;
  }

  public function setCelular(int $celular): void {
    $this->celular = $celular;
  }

  public function exibirInformacoes(): string {
    return "Nome: " . $this->nome . "<br>" .
            "Data de Nascimento: " . $this->data_nascimento . "<br>" .
            "Email: " . $this->email . "<br>" .
            "Celular: " . $this->celular . "<br>" ;
  }
}
?>
