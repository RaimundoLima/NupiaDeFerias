<?php
	include_once("../model/acao.php");
	include("controller.php"); 
	$eixo = $_POST["eixo"];
	$projeto = $_POST["projeto"];
	$titulo = $_POST["titulo"];
	$tema = $_POST["tema"];
	$palavraChave = $_POST["palavraChave"];
	$prevInicio = $_POST["prevInicio"];
	$prevTermino = $_POST["prevTermino"];
	$situacao = $_POST["situacao"];
	$acao = new Acao($eixo, $projeto, $titulo, $tema, $palavraChave, $prevInicio, $prevTermino, $situacao);
	adicionarAcao($acao);
?>