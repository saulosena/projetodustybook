<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
	    echo "<script>alert('Sessao nao iniciada!');";
		echo "location.href='DustyBookPaginaPrincipal.php'</script>";
   }
  $id=$_POST['id'];
  //echo $id;
?>

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8"/>
 <style><title>Dusty Book/Cadastro Livro</title></style>
 <link rel="stylesheet" type="text/css" href ="DustyBook.css" />
 </head>
<body>
<div class="grid-container">
  
  <div class="grid-item item10">Atualiza Livro</div>
  <div class="grid-item item11">
   <form action="DustyBookAtualizaLivro.php" method="POST" enctype="multipart/form-data">
         <br>
		 <br>
		 Nome Livro:<br>
		 <input type="text" name="nomel" ><br>
		 Autor:<br>
         <input type="text" name="autorl" ><br>
		 Ano de Edicao<br>
		 <input type="number" name="anoedl" min='4'  max="4"><br>
		 Edicao:<br>
         <input type="number" name="edl" min='1'  max="4"><br>	
		 Valor:<br>
		 <input type="double" name="valorl"><br>
		  Materia:<br>
         <input type="text" name="material"><br>
		 Tema:<br>
         <input type="text" name="temal"><br>
         Comentarios:<br>
         <textarea type="text" name="comentariol"  rows="20" cols="70" ></textarea><br>	
		 Foto Livro:<br>
		 <input type="file" name="fotol"><br> 
		 <input class="submit" type="hidden" name="id" value="<?php echo $id; ?>"><br>
		 <br>
		 <br>
		 <input type="submit" value="Atualizar">
  </form>
  <br><br>
  
    <ul class="nav navbar-nav"> 
   <li> <a href="DustyBookPaginaPrincipal.php"><b><font color="#ffffff">Home</font></b></a></li>
   <li><a href="DustyBookPesquisaSession2.php"><b><font color="#ffffff">Livros</font></b></a></li>
   <li> <a href="DustyBookPesquisaComentarioSession2.php"><b><font color="#ffffff">Dicas</font></b></a> </li>
   <li> <a href="DustyBookSobre.html"><b><font color="#ffffff">Sobre</font></b></a></li>
   </ul>
  </div>
  </div>
  
   
   </body>
</html>