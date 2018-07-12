<?php
include_once("DustyBookConexao.php");
session_start();


$materia=$_POST['materia'];

$_SESSION['material'] = $materia;

			
 echo "<script> location.href='DustyBookPesquisaComentarios.php'</script>"; 
	
		?>