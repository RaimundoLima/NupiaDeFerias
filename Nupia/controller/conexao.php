<?php
function conexao(){
  $db = pg_connect("host=localhost port=5432 dbname=nupia user=postgres password=postgres");
  return $db;
}
 ?>
