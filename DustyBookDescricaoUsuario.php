<?php
include_once("DustyBookConexao.php");
session_start();
if(!isset($_SESSION['id_usuario'])){
	    echo "<script>alert('Sem permisao de administrador!');";
		echo "location.href='DustyBookPaginaPrincipal.php'</script>";
   }
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
 <title>Dusty Book/ Descricao Usuario</title>
 <link rel="stylesheet" type="text/css" href ="DustyBook.css">
 <link href="css/bootstrap.css" rel="stylesheet">
 </head>
<body>
<div class="grid-container">

  <div class="grid-item item1">
  <a href="DustyBookPaginaPrincipal.html"><img width="230px" height="200px" src="Dusty.jpg"></a>

  </div>

  <div class="grid-item item2">
   <ul class="nav navbar-nav"> 
   <li> <a href="DustyBookPaginaPrincipal.php"><b><font color="#ffffff">Home</font></b></a></li>
   <li><a href="DustyBookPesquisaSession2.php"><b><font color="#ffffff">Livros</font></b></a></li>
   <li> <a href="DustyBookPesquisaComentarioSession2.php"><b><font color="#ffffff">Dicas</font></b></a> </li>
   <li> <a href="DustyBookSobre.html"><b><font color="#ffffff">Sobre</font></b></a></li>
	  
	 </ul>
  </div>

  <div class="grid-item item3">
     <form action="DustyBookPesquisaSession.php" method="POST">
         <p><b>Pesquisar Livro</b></p>
		     <br><b>Nome do livro:</b><br>
		     <input type="text" name="nome"><br>
		     <br><b>Materia:</b><br>
             <input type="double" name="materia"><br>
		     <br><b>Autor:</b><br>
		     <input type="text" name="autor"><br>
             <br>
		     <button class="button">Pesquisar</button>
        </br>
      </form>
   </div>
   <div class="grid-item item9">
   
   <?php

	  $id=$_SESSION['id_usuario'];
  
   
   
   $pesquisa= "SELECT *FROM usuarios WHERE id ='$id'";
		$array_pesquisa=mysqli_query($link,$pesquisa);
		while ($row_usuario = mysqli_fetch_object($array_pesquisa)){
			$foto= "fotousers/".$row_usuario->foto; 
			echo "<img src='$foto' alt=".$row_usuario->foto. " width='250' height='250'  /><br />";
			echo "Nome:","<br>";
			echo $row_usuario->nome ,"<br>";
			echo "Sobrenome:","<br>";
			echo $row_usuario->sobrenome ,"<br>";
			echo "Data de Nascimento:","<br>";
			echo $row_usuario->data_nasc ,"<br>";
			echo "Sexo:","<br>";
			echo $row_usuario->sexo ,"<br>";
			echo "Telefone 1:","<br>";
			echo $row_usuario->telefone1 ,"<br>";
			echo "Telefone 2:","<br>";
			echo $row_usuario->telefone2 ,"<br>";
			echo "Email:","<br>";
			echo $row_usuario->email ,"<br>";
			echo "Endereço:","<br>";
			echo "Rua:","<br>";
			echo $row_usuario->endereco ,"<br>";
			echo "Numero:","<br>";
			echo $row_usuario->numero_end ,"<br>";
			echo "Complemento:","<br>";
			echo $row_usuario->complemento ,"<br>";
			echo "Cidade:","<br>";
			echo $row_usuario->cidade ,"<br>";
			echo "Estado:","<br>";
			echo $row_usuario->estado ,"<br>";
			echo "Cep:","<br>";
			echo $row_usuario->cep ,"<br>";
			
			
			if($_SESSION['id_usuario']==$id){
			echo '<ul>';
            echo '<li>';			
			echo'<form action="DustyBookAtualizaCadastro.html" method="POST">';
			echo '<input type="submit" value="Atualizar Dados">';
			echo '</form>';
			echo '</li>';
            echo '<li>';
		    echo'<form action="DustyBookDeletaConta.php" method="POST">';
			echo '<input class="submit" type="hidden" name="id" value="'.$row_usuario->id.'"/>';
			echo '<input type="submit" value="Excluir"><hr>';
			echo '</form>'; 
			echo '</li>';
            echo '<li>';
		    echo'<form action="DustyBookPaginaPrincipal.php" method="POST">';
			echo '<input type="submit" value="Voltar"><hr>';
			echo '</form>'; 
			echo '</li>';
            echo '</ul>';
			}
			
            }
			
			
			
   ?>
   		 
          </form>
   </div>
   </body>        
</html>





