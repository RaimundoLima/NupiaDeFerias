<?php
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
    for($i=0; $i<count($result); $i++){
      $nome = $listaProjeto[$i]["nome"];
      $descricao = $listaProjeto[$i]["descricao"];
      $projeto = new Projeto($nome, $descricao);
      $listaProjetoObj.append($projeto);
    }
    return $listaProjetoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from projeto where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $projeto = pg_fetch_one($result);
    pg_close($conexao);
    $nome = $projeto[$i]["nome"];
    $descricao = $projeto[$i]["descricao"];
    $projetoObj = new Eixo($nome, $descricao);
    return $projetoObj;
  }
  function editar($projeto){
    $conexao = conexao();
    $nome = $projeto->getNome();
    $descricao = $projeto->getDescricao();
    $query = "UPDATE projeto set nome='".$nome."',descricao='".$descricao."'";
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
