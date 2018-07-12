
<?php
include_once("DustyBookConexao.php");
session_start();

$nome=$_POST['nome'];
$autor=$_POST['autor'];
$materia=$_POST['materia'];

$_SESSION['nomel'] =$nome ;
$_SESSION['autorl'] = $autor;
$_SESSION['material'] = $materia;

			
 echo "<script> location.href='DustyBookPesquisa.php'</script>"; 
	
		?>