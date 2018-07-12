<?php

include_once("DustyBookConexao.php");
session_start();
$_SESSION['login'] ;
$_SESSION['senha'] ;
$_SESSION['nome'];
$_SESSION['id_usuario'];
$_SESSION['adm'];			
session_destroy	();		
echo "<script>alert('logout efetuado com sucesso!');";
 echo "location.href='DustyBookPaginaPrincipal.php'</script>";			
			
		
		
?>