<?php
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
    for($i=0; $i<count($result); $i++){
      $nome = $listaEixo[$i]["nome"];
      $descricao = $listaEixo[$i]["descricao"];
      $eixo = new Eixo($nome, $descricao);
      $listaEixoObj.append($eixo);
    }
    return $listaEixoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from eixo where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $eixo = pg_fetch_one($result);
    pg_close($conexao);
    $nome = $eixo[$i]["nome"];
    $descricao = $eixo[$i]["descricao"];
    $eixoObj = new Eixo($nome, $descricao);
    return $eixoObj;
  }
  function editar($eixo){
    $conexao = conexao();
    $nome = $eixo->getNome();
    $descricao = $eixo->getDescricao();
    $query = "UPDATE eixo set nome='".$nome."',descricao='".$descricao."'";
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
