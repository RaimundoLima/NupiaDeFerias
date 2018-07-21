<?php
include_once('../controller/conexao.php');
include_once('ator.php');
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
    for($i=0; $i<count($listaAtor); $i++){
      $id = $listaAtor[$i]["id"];
      $nome = $listaAtor[$i]["nome"];
      $tipo = $listaAtor[$i]["tipo"];
      $senha = $listaAtor[$i]["senha"];
      $email = $listaAtor[$i]["email"];
      $codigo = $listaAtor[$i]["codigo"];
      $ator = new Ator($nome, $tipo, $senha, $email, $codigo, $id);
      array_push($listaAtorObj, $ator);
    }
    return $listaAtorObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from ator where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $ator = pg_fetch_all($result);
    pg_close($conexao);
    $id = $ator[0]["id"];
    $nome = $ator[0]["nome"];
    $tipo = $ator[0]["tipo"];
    $senha = $ator[0]["senha"];
    $email = $ator[0]["email"];
    $codigo = $ator[0]["codigo"];
    $atorObj = new Ator($nome, $tipo, $senha, $email, $codigo, $id);
    return $atorObj;
  }

  function obterByEmail($email){
    $conexao = conexao();
    $query = "select * from ator where email = '".$email."'";
    $result = pg_query($conexao, $query);
    $ator = pg_fetch_all($result);
    pg_close($conexao);
    $id = $ator[0]["id"];
    $nome = $ator[0]["nome"];
    $tipo = $ator[0]["tipo"];
    $senha = $ator[0]["senha"];
    $email = $ator[0]["email"];
    $codigo = $ator[0]["codigo"];
    $atorObj = new Ator($nome, $tipo, $senha, $email, $codigo, $id);
    return $atorObj;
  }

  function editar($ator){
    $conexao = conexao();
    $id = $ator->getId();
    $nome = $ator->getNome();
    $tipo = $ator->getTipo();
    $senha = $ator->getSenha();
    $email = $ator->getEmail();
    $codigo = $ator->getCodigo();
    $query = "UPDATE ator set nome='".$nome."',tipo='".$tipo."',senha='".$senha."',email='".$email."',codigo='".$codigo."' where id='".$id."'";
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
