<?php
function conexao(){
$db = pg_connect("host=localhost port=5433 dbname=nupia user=postgres password=postgres"));
return $db;
}
 ?>
