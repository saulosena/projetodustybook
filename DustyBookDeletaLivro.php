<?php

 include_once("DustyBookConexao.php");

 $id=$_POST['id'];
 
 $deletar=" DELETE FROM livros WHERE id_livro = '$id'";
 $resultado=mysqli_query($link,$deletar);
 
 if(!isset($resultado)){
	die("Falha ao executar o comando: " . mysql_error());
 }else{
    echo "<script>alert('livro excluido!');";
    echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 
 }


?>