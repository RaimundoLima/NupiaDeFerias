<?php
  include_once("../model/ator.php");
  include_once("../model/atorDAO.php");
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $tipo = $_POST["tipo"];
  $senha = $_POST["senha"];
  $email = $_POST["email"];
  $codigo = $_POST["codigo"];
  $ator = new Ator($nome, $tipo, $senha, $email, $codigo, $id);
  $atorDAO = new AtorDAO();
  $atorDAO->editar($ator);
