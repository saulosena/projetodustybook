<?php

include_once("DustyBookConexao.php");
session_start();

$usuario=$_POST['login'];
$senha=$_POST['senha'];


		$result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha' ";
		$resultado_usuario = mysqli_query($link, $result_usuario);
		$resultado = mysqli_fetch_object($resultado_usuario);
		
		
		
		
		if($resultado != NULL){
			$_SESSION['login'] = $resultado->email;
			$_SESSION['senha'] = $resultado->senha;
			$_SESSION['nome'] = $resultado->nome;
			$_SESSION['id_usuario']=$resultado->id;
			
			if($resultado->adm == 1){
				$_SESSION['adm']=$resultado->adm;
			}else{
				$_SESSION['adm']= NULL;
			}
		   echo "<script>alert('login efetuado com sucesso!');";
           echo "location.href='DustyBookPaginaPrincipal.php'</script>";
		}else{	
		   echo "<script>alert('Login ou senha errados!');";
		   echo "location.href='DustyBookPaginaPrincipal.php'</script>"; }
		
?>