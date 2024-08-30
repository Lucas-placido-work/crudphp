<?php 
  $hostname = "localhost";
  $bancodedados = "alphacode";
  $usuario = "root";
  $password = "";

  $mysqli = new mysqli($hostname, $usuario,$password,$bancodedados);
  if($mysqli->connect_errno){
    echo "falha ao conectar:(".$mysqli->connect_errno.")";
  }
  else
    echo "Conectei com o banco";
  
?>