<?php

include_once("DustyBookConexao.php");
session_start();
$_SESSION['login'] ;
$_SESSION['senha'] ;
$_SESSION['nome'];
			
session_destroy	();		
echo "<script>alert('logout efetuado com sucesso!');";
 echo "location.href='DustyBookPaginaPrincipal.php'</script>";			
			
		
		
?>