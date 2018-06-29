<?php

include_once("DustyBookConexao.php");
session_start();

$usuario=$_POST['login'];
$senha=$_POST['senha'];


		$result_usuario = "SELECT * FROM usuarios WHERE email LIKE '%".$usuario."%' AND senha LIKE'%".$senha."%'  ";
		$resultado_usuario = mysqli_query($link, $result_usuario);
		$resultado = mysqli_fetch_object($resultado_usuario);
		
		
		
		
		if($resultado != NULL){
			$_SESSION['login'] = $resultado->email;
			$_SESSION['senha'] = $resultado->senha;
			$_SESSION['nome'] = $resultado->nome;
			//echo $_SESSION['login'];
			//echo $_SESSION['senha'];
			//echo $_SESSION['nome'];
			echo "<script>alert('login efetuado com sucesso!');";
            echo "location.href='DustyBookPaginaPrincipal.php'</script>";
		}else{	
		   echo "<script>alert('Login ou senha errados!');";
           echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 
		}
		
?>