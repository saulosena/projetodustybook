<?php
include_once("DustyBookConexao.php");

session_start();


$_SESSION['material'] = NULL;
			
 echo "<script> location.href='DustyBookPesquisaComentarios.php'</script>"; 

?>