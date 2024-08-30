<?php 
  include("connection.php");
  
  $nome = $_GET["nome"];
  $data = $_GET["data"];
  $mail = $_GET["mail"];
  $profissao = $_GET["profissao"];
  $telefone = $_GET["telefone"];
  $celular = $_GET["celular"];
  $checkWpp = $_GET["checkWpp"] ?? false;
  $notifyEmail = $_GET["notifyEmail"] ?? false;
  $notifySms = $_GET["notifySms"] ?? false;

  
  

?>