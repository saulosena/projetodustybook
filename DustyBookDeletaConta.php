<?php

 include_once("DustyBookConexao.php");
 session_start();
 $id=$_POST['id'];
 
 $deletar=" DELETE FROM usuarios WHERE id = '$id'";
 $resultado=mysqli_query($link,$deletar);
 $deletar2=" DELETE FROM livros WHERE id_usuario = '$id'";
 $resultado2=mysqli_query($link,$deletar2);
 
 
 if(!isset($resultado)){
	die("Falha ao executar o comando: " . mysql_error());
 }elseif(isset($_SESSION['adm'])){
	 if($id =! $_SESSION['id_usuario']){
	  echo "<script>alert('Conta Excluida!');";
	  echo "location.href='DustyBookListaUsario.php'</script>"; }
	  elseif($id = $_SESSION['id_usuario']){
	  $_SESSION['login']; 
      $_SESSION['senha']; 
      $_SESSION['nome']; 
      $_SESSION['id_usuario'];
     session_destroy(); 
	  echo "<script>alert('Conta Excluida!');";
	  echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 	  
	  }
 }else{ 
      $_SESSION['login']; 
      $_SESSION['senha']; 
      $_SESSION['nome']; 
      $_SESSION['id_usuario'];
     session_destroy(); 
    echo "<script>alert('Conta Excluida!');";
    echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 
 }


?>