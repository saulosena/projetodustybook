<?php
include_once("DustyBookConexao.php");
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
 <title>Dusty Book/Descricao Livro</title>
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
   session_start();
   
    
   if(!isset($_SESSION['id_usuario'])){
		
		if(!isset($_POST['id'])){
			$id=$_SESSION['descl'];
		}else{
			$id=$_POST['id'];
		}
		
		
		$_SESSION['descl']=$id;
		
		$pesquisa= "SELECT *FROM livros WHERE id_livro = $id ";
		$array_pesquisa=mysqli_query($link,$pesquisa);
		while ($row_livro = mysqli_fetch_object($array_pesquisa)){
			$foto= "fotos/".$row_livro->fotol; 
		    echo "<img src='$foto' alt=".$row_livro->fotol. " width='250' height='250'  /><br />";
			echo "livro:",       $row_livro->nomel ,"<br>";
            echo "autor:  "   ,  $row_livro->autorl ,"<br>";
            echo "edicao:  "  ,  $row_livro->edl    ,"<br>";
            echo "valor:  "  ,   $row_livro->valorl ,"<br>";
		    echo "comentario:  ",$row_livro->comentariol,"<br>";
			$id_u= $row_livro->id_usuario;
		    $user= "SELECT *FROM usuarios WHERE id = $id_u ";
		    $array_user=mysqli_query($link,$user);
			while ($row_user = mysqli_fetch_object($array_user)){
			$foto= "fotousers/".$row_user->foto; 
		    echo '<br >';
			echo "<table >";
            echo "<tr>"	;
			echo "<td rowspan='4' ><img src= '$foto' alt='$row_user->foto' width='200' height='150'  /><td></td>";
			echo "<tr><td>Nome :<td> $row_user->nome</td></tr>";
            echo "<tr><td>Telefone 1:<td> $row_user->telefone1</td></tr>";
            echo "<tr><td>Telefone 2:<td> $row_user->telefone2</td></tr>";
			echo "<tr><td>Email  :<td>$row_user->email</td></tr>";
			echo "</table>";	
		   
			}
			
			echo'<form action="DustyBookPesquisa.php" method="POST">';
			echo '<input type="submit" value="Voltar"><hr>';
            echo '</form>';
			}
		   
		
		
	}elseif(isset($_SESSION['id_usuario'])){

	  if(!isset($_POST['id'])){
			$id=$_SESSION['descl'];
		}else{
			$id=$_POST['id'];
		}
	    	$_SESSION['descl']=$id;
	
      if(!isset($_SESSION['temp'])){
	  $id=$_POST['id'];
	  
      }else{
        $id =$_SESSION['temp'];
	   unset($_SESSION['temp']);
      }
   
   $pesquisa= "SELECT *FROM livros WHERE id_livro = $id ";
		$array_pesquisa=mysqli_query($link,$pesquisa);
		while ($row_livro = mysqli_fetch_object($array_pesquisa)){
			$foto= "fotos/".$row_livro->fotol; 
		    echo "<img src='$foto' alt=".$row_livro->fotol. " width='250' height='250'  /><br />";
			echo "livro:",       $row_livro->nomel ,"<br>";
            echo "autor:  "   ,  $row_livro->autorl ,"<br>";
            echo "edicao:  "  ,  $row_livro->edl    ,"<br>";
            echo "valor:  "  ,   $row_livro->valorl ,"<br>";
		    echo "comentario:  ",$row_livro->comentariol,"<br>";
			$id_u= $row_livro->id_usuario;
		   }
		   $id_check=$_SESSION['id_usuario']; 
		   if($id_u == $id_check){
			echo '<ul>';
            echo '<li>';			
		    echo'<form action="DustyBookAtualizaLivroform.php" method="POST">';
			echo '<input class="submit" type="hidden" name="id" value="'.$id.'"/>';
			echo '<input type="submit" value="Atualizar"><hr>';
            echo '</form>';
			echo'</li>';
			echo'<li>';
			echo '<form action="DustyBookDeletaLivro.php" method="POST">';
			echo '<input class="submit" type="hidden" name="id" value="'.$id.'"/>';
			echo '<input type="submit" value="Excluir"><hr>';
			echo '</form>';
			echo'</li>';
			echo'<l1>';
			echo'<form action="DustyBookMeusLivros.php" method="POST">';
			echo '<input type="submit" value="Voltar"><hr>';
            echo '</form>';
			echo '</li>';
			echo'</ul>';
			
			}else{
				$user= "SELECT *FROM usuarios WHERE id = $id_u ";
		    $array_user=mysqli_query($link,$user);
			while ($row_user = mysqli_fetch_object($array_user)){
			$foto= "fotousers/".$row_user->foto; 
		    echo '<br >';
			echo "<table >";
            echo "<tr>"	;
			echo "<td rowspan='4' ><img src= '$foto' alt='$row_user->foto' width='200' height='150'  /><td></td>";
			echo "<tr><td>Nome :<td> $row_user->nome</td></tr>";
            echo "<tr><td>Telefone 1:<td> $row_user->telefone1</td></tr>";
            echo "<tr><td>Telefone 2:<td> $row_user->telefone2</td></tr>";
			echo "<tr><td>Email<td>$row_user->email</td></tr>";
			echo "</table>";	
			echo'<form action="DustyBookPesquisa.php" method="POST">';
			echo '<input type="submit" value="Voltar"><hr>';
            echo '</form>';
			}
	}}
   
   ?>
   
   </div>
   </body>
</html>