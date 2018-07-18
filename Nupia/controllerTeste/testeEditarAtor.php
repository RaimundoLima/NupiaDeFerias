<?php
  include_once("../model/ator.php");
  include_once("../model/atorDAO.php");
  $nome = $_POST["nome"];
  $tipo = $_POST["tipo"];
  $senha = $_POST["senha"];
  $email = $_POST["email"];
  $codigo = $_POST["codigo"];
  $ator = new Ator($nome, $tipo, $senha, $email, $codigo);
  $atorDAO = new AtorDAO();
  $atorDAO->editar($ator);
