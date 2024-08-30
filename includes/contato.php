<?php
class Contato {
  private string $nome;
  private DateTime $data_nascimento;
  private string $email;
  private string $profissao;
  private int $telefone;
  private int $celular;
  private bool $wpp;
  private bool $notify_email;
  private bool $notify_sms;

  public function __construct(
    string $nome, 
    DateTime $data_nascimento, 
    string $email, 
    string $profissao, 
    int $telefone, 
    int $celular, 
    bool $wpp, 
    bool $notify_email, 
    bool $notify_sms
  ) {
    $this->nome = $nome;
    $this->data_nascimento = $data_nascimento;
    $this->email = $email;
    $this->profissao = $profissao;
    $this->telefone = $telefone;
    $this->celular = $celular;
    $this->wpp = $wpp;
    $this->notify_email = $notify_email;
    $this->notify_sms = $notify_sms;
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

  public function getProfissao(): string {
    return $this->profissao;
  }

  public function getTelefone(): int {
    return $this->telefone;
  }

  public function getCelular(): int {
    return $this->celular;
  }

  public function isWpp(): bool {
    return $this->wpp;
  }

  public function isNotifyEmail(): bool {
    return $this->notify_email;
  }

  public function isNotifySms(): bool {
    return $this->notify_sms;
  }

  public function setNome(string $nome): void {
    $this->nome = $nome;
  }

  public function setDataNascimento($data_nascimento): void {
    $this->data_nascimento = $data_nascimento;
  }

  public function setEmail(string $email): void {
    if ($this->validarEmail($email)) {
        $this->email = $email;
    } else {
        throw new InvalidArgumentException("Email inválido");
    }
  }

  public function setProfissao(string $profissao): void {
    $this->profissao = $profissao;
  }

  public function setTelefone(int $telefone): void {
    if ($this->validarTelefone($telefone)) {
        $this->telefone = $telefone;
    } else {
        throw new InvalidArgumentException("Telefone inválido");
    }
  }

  public function setCelular(int $celular): void {
    if ($this->validarTelefone($celular)) {
        $this->celular = $celular;
    } else {
        throw new InvalidArgumentException("Celular inválido");
    }
  }

  public function setWpp(bool $wpp): void {
    $this->wpp = $wpp;
  }

  public function setNotifyEmail(bool $notify_email): void {
    $this->notify_email = $notify_email;
  }

  public function setNotifySms(bool $notify_sms): void {
    $this->notify_sms = $notify_sms;
  }

  private function validarEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }

  private function validarTelefone(int $telefone): bool {
    return preg_match('/^\d{10,11}$/', (string)$telefone);
  }

  public function exibirInformacoes(): string {
    return "Nome: " . $this->nome . "<br>" .
            "Data de Nascimento: " . $this->data_nascimento . "<br>" .
            "Email: " . $this->email . "<br>" .
            "Profissão: " . $this->profissao . "<br>" .
            "Telefone: " . $this->telefone . "<br>" .
            "Celular: " . $this->celular . "<br>" .
            "WhatsApp: " . ($this->wpp ? "Sim" : "Não") . "<br>" .
            "Notificar por Email: " . ($this->notify_email ? "Sim" : "Não") . "<br>" .
            "Notificar por SMS: " . ($this->notify_sms ? "Sim" : "Não");
  }
}
?>
