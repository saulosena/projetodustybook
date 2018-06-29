<?php
$host = "localhost";
$db   = "dustybook";
$user = "root";
$pass = "";
// conecta ao banco de dados
$link = mysqli_connect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
if (!$link) {
die('ERRO NO SERVIDOR: ' . mysqli_connect_error());
mysqli_close($link);
}//else{
  //  echo 'Conexão bem sucedida';}
$db_selected = mysqli_select_db( $link, $db);
if (!$db_selected) {
die ('ERRO NO SERVIDOR: ' . mysqli_connect_error()); 
mysqli_close($link);}
//else{
	// echo 'Conexão bem sucedida';}


?>
