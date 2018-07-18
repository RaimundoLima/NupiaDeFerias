<?php
include('../controller/conexao.php');
class AtorDAO{
  function adicionar($ator){
    $nome = $ator->getNome();
    $tipo = $ator->getTipo();
    $senha = $ator->getSenha();
    $email = $ator->getEmail();
    $codigo = $ator->getCodigo();
    $conexao = conexao();
    $query = "insert into ator(nome, tipo, senha, email, codigo) values('".$nome."', '".$tipo."', '".$senha."', '".$email."', '".$codigo."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from ator";
    $result = pg_query($conexao, $query);
    $listaAtor = pg_fetch_all($result);
    pg_close($conexao);
    $listaAtorObj = [];
    for($i=0; $i<count($result); $i++){
      $nome = $listaAtor[$i]["nome"];
      $tipo = $listaAtor[$i]["tipo"];
      $senha = $listaAtor[$i]["senha"];
      $email = $listaAtor[$i]["email"];
      $codigo = $listaAtor[$i]["codigo"];
      $ator = new Ator($nome, $tipo, $senha, $email, $codigo);
      $listaAtorObj.append($ator);
    }
    return $listaAtorObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from ator where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $ator = pg_fetch_one($result);
    pg_close($conexao);
    $nome = $ator[$i]["nome"];
    $tipo = $ator[$i]["tipo"];
    $senha = $ator[$i]["senha"];
    $email = $ator[$i]["email"];
    $codigo = $ator[$i]["codigo"];
    $atorObj = new Ator($nome, $tipo, $senha, $email, $codigo);
    return $atorObj;
  }
  function editar($ator){
    $conexao = conexao();
    $nome = $ator->getNome();
    $tipo = $ator->getTipo();
    $senha = $ator->getSenha();
    $email = $ator->getEmail();
    $codigo = $ator->getCodigo();
    $query = "UPDATE ator set nome='".$nome."',tipo='".$tipo."',senha='".$senha."',email='".$email."',codigo='".$codigo."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM ator WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
}
  ?>
