<?php
include_once("DustyBookConexao.php");
?> 

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8"/>
 <title>Dusty Book/Descricao</title>
 <link rel="stylesheet" type="text/css" href ="DustyBook.css" />
 </head>
<body>
<div class="grid-container">
  
  <div class="grid-item item1">
  <a href="" target="_blank"><img width="230px" height="200px" src="https://scontent.fmcz3-1.fna.fbcdn.net/v/t1.0-9/33384816_2017400728333279_2452622180819664896_n.jpg?_nc_cat=0&oh=d734f9cea5825a08c7689c687e3e2abc&oe=5B821AD1"></a>
  
  </div>
  
  <div class="grid-item item2">
   <ul>
      <ul>
      <li> <a href="DustyBookDescricaoUsuario.php" target="_blank">Meus Dados</a> </li>
	  <li> <a href="DustyBookSobre.html" target="_blank">Sobre</a></li>
	  <li> <a href="DustyBookPesquisa.php" target="_blank">Livros</a> </li>
	  <li> <a href="DustyBookPaginaPrincipal.html" target="_blank">Home </a></li>
	 </ul> 
  </div>
 
  <div class="grid-item item3">
     <form action="DustyBookPaginaPrincipal.html" method="POST">
         <p>Pesquisar</p>
		 Nome livro<br>
		 <input type="text" name="livro"><br>
		 Valor<br>
         <input type="double" name="valor"><br>
		 Autor<br>
		 <input type="text" name="livro"> <br>
		 <input type="submit" value="Pesquisar">
          </form>
   </div>
   
   <div class="grid-item item9">
   
   <?php

   $id='1';
 
   
   $pesquisa= "SELECT *FROM usuarios WHERE id = $id ";
		$array_pesquisa=mysqli_query($link,$pesquisa);
		while ($row_usuario = mysqli_fetch_object($array_pesquisa)){
			
			
			
		    }
   
   ?>
   
   </div>
   </body>        
</html>