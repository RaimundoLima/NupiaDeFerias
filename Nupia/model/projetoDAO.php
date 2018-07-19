<?php
include_once("../controller/conexao.php");
include_once("projeto.php");
class ProjetoDAO{
  function adicionar($projeto){
    $nome = $projeto->getNome();
    $descricao = $projeto->getDescricao();
    $conexao = conexao();
    $query = "insert into projeto(nome, descricao) values('".$nome."', '".$descricao."')";
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
      $projeto = new Projeto($nome, $descricao, $id);
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
    $projetoObj = new Eixo($nome, $descricao, $id);
    return $projetoObj;
  }
  function editar($projeto){
    $conexao = conexao();
    $id = $projeto->getId();
    $nome = $projeto->getNome();
    $descricao = $projeto->getDescricao();
    $query = "UPDATE projeto set nome='".$nome."',descricao='".$descricao."' where id='".$id."'";
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
