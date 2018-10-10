<?php
include_once("controller/conexao.php");
include_once("projeto.php");
class ProjetoDAO{
  function adicionar($projeto){
    $nome = $projeto->getNome();
    $descricao = $projeto->getDescricao();
    $link = $projeto->getLink();
    $conexao = conexao();
    $query = "insert into projeto(nome, descricao, link) values('".$nome."', '".$descricao."', '".$link."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from projeto";
    $result = pg_query($conexao, $query);
    $listaProjeto = pg_fetch_all($result);
    pg_close($conexao);
    $listaProjetoObj = [];
    for($i=0; $i<count($listaProjeto); $i++){
      $id = $listaProjeto[$i]["id"];
      $nome = $listaProjeto[$i]["nome"];
      $descricao = $listaProjeto[$i]["descricao"];
      $link = $listaProjeto[$i]["link"];
      $projeto = new Projeto($nome, $descricao, $link, $id);
      array_push($listaProjetoObj, $projeto);
    }
    return $listaProjetoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from projeto where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $projeto = pg_fetch_all($result);
    pg_close($conexao);
    $id = $projeto[0]["id"];
    $nome = $projeto[0]["nome"];
    $descricao = $projeto[0]["descricao"];
    $link = $projeto[0]["link"];
    $projetoObj = new Projeto($nome, $descricao, $link, $id);
    return $projetoObj;
  }
  function editar($projeto){
    $conexao = conexao();
    $id = $projeto->getId();
    $nome = $projeto->getNome();
    $descricao = $projeto->getDescricao();
    $link = $projeto->getLink();
    $query = "update projeto set nome='".$nome."',descricao='".$descricao."', link='".$link."' where id='".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM projeto WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
}
 ?>
