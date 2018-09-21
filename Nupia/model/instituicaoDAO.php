<?php
include_once("controller/conexao.php");
include_once("instituicao.php");
class InstituicaoDAO{
  function adicionar($instituicao){
    $nome = $instituicao->getNome();
    $situacao = $instituicao->getSituacao();
    $conexao = conexao();
    $query = "insert into instituicao(nome, situacao) values('".$nome."', '".$instituicao."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from instituicao";
    $result = pg_query($conexao, $query);
    $listaInstituicao = pg_fetch_all($result);
    pg_close($conexao);
    $listaInstituicaosObj = [];
    for($i=0; $i<count($listaInstituicao); $i++){
      $id = $listaInstituicao[$i]["id"];
      $nome = $listaInstituicao[$i]["nome"];
      $descricao = $listaInstituicao[$i]["descricao"];
      $instituicao = new Instituicao($nome, $instituicao, $id);
      array_push($listaInstituicaoObj, $eixo);
    }
    return $listaInstituicaoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from instituicao where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $instituicao = pg_fetch_all($result);
    pg_close($conexao);
    $id = $instituicao[0]["id"];
    $nome = $instituicao[0]["nome"];
    $situacao = $instituicao[0]["situacao"];
    $instituicaoObj = new Instituicao($nome, $situacao, $id);
    return $instituicaoObj;
  }
  function editar($instituicao){
    $conexao = conexao();
    $id = $instituicao->getId();
    $nome = $instituicao->getNome();
    $situacao = $instituicao->getSituacao();
    $query = "UPDATE instituicao set nome='".$nome."',situacao='".$situacao."' where id='".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM instituicao WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
}
?>
