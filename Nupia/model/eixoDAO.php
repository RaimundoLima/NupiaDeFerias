<?php
include_once("controller/conexao.php");
include_once("eixo.php");
class EixoDAO{
  function adicionar($eixo){
    $nome = $eixo->getNome();
    $descricao = $eixo->getDescricao();
    $conexao = conexao();
    $query = "insert into eixo(nome, descricao) values('".$nome."', '".$descricao."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from eixo";
    $result = pg_query($conexao, $query);
    $listaEixo = pg_fetch_all($result);
    pg_close($conexao);
    $listaEixoObj = [];
    for($i=0; $i<count($listaEixo); $i++){
      $id = $listaEixo[$i]["id"];
      $nome = $listaEixo[$i]["nome"];
      $descricao = $listaEixo[$i]["descricao"];
      $eixo = new Eixo($nome, $descricao, $id);
      array_push($listaEixoObj, $eixo);
    }
    return $listaEixoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from eixo where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $eixo = pg_fetch_all($result);
    pg_close($conexao);
    $id = $eixo[0]["id"];
    $nome = $eixo[0]["nome"];
    $descricao = $eixo[0]["descricao"];
    $eixoObj = new Eixo($nome, $descricao, $id);
    return $eixoObj;
  }
  function editar($eixo){
    $conexao = conexao();
    $id = $eixo->getId();
    $nome = $eixo->getNome();
    $descricao = $eixo->getDescricao();
    $query = "UPDATE eixo set nome='".$nome."',descricao='".$descricao."' where id='".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM eixo WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
}
 ?>
