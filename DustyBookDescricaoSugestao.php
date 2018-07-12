<?php
include_once("DustyBookConexao.php");
session_start();
if(!isset($_SESSION['adm'])){
	    echo "<script>alert('Sem permisao de administrador!');";
		echo "location.href='DustyBookPaginaPrincipal.php'</script>";
   }
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
 <title>Dusty Book/Descricao Sugestao</title>
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
   
   if(!isset($_SESSION['temp'])){
	  $id=$_POST['id'];
	  
      }else{
        $id =$_SESSION['temp'];
	   unset($_SESSION['temp']);
      }
    $pesquisa= "SELECT *FROM sugestoes WHERE id ='$id' ";
		$array_pesquisa=mysqli_query($link,$pesquisa);
		while ($row_sugestoes = mysqli_fetch_object($array_pesquisa)){
			echo "Sugestao numero:",$row_sugestoes->id ,"<br>";
			echo "Nome:",           $row_sugestoes->nome ,"<br>";
			echo "Sugestao: ",        $row_sugestoes->sugestao ,"<br>";
            echo "Status: ",        $row_sugestoes->status ,"<br>";
			echo'<form action="DustyBookAtualizaStatus.php" method="POST">';
			echo'<select name="status" >';
            echo'<option type="radio" value= "resolvido" > Resolvido </option>';
            echo'<option type="radio" value= "processando" > Processando  </option>';
            echo'</select><br>';
			echo '<input class="submit" type="hidden" name="id" value="'.$row_sugestoes->id.'"/>';
			echo '<input type="submit" value="Atualiza"><hr>';
			echo '</form>';	
		}
   
   
   
   
   ?>
   </div>
   </body>
</html>