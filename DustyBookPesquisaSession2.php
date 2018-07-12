<?php
include_once("DustyBookConexao.php");

session_start();

$_SESSION['nomel'] = NULL ;
$_SESSION['autorl'] = NULL;
$_SESSION['material'] = NULL;
			
 echo "<script> location.href='DustyBookPesquisa.php'</script>"; 

?>