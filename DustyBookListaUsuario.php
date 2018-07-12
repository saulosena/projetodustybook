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
 <title>Dusty Book/Lista Usuarios</title>
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
      <?php
	      // session_start();
          // $usuario = $_SESSION['nome'];
      ?>
		  <p>Bem Vindo<br>
		  <?php //echo $usuario; ?><p>
		  <form action="DustyBookDescricaoUsuario.php" method="POST">
		 <p>Meus Dados<br>
		  <button class="button">Detalhes</button>
          </form>
		 <form action="DustyBookCadastroLivro.html" method="POST">
		 <p>Cadastrar livro para venda<br>
		  <button class="button">Cadastrar</button>
          </form>
		  <form action="DustyBookMeusLivros.php" method="POST">
		 <p>Meus Livros<br>
		  <button class="button">Detalhes</button>
          </form>
          <form action="DustyBookListaUsuario.php" method="POST">
		  <p>Usuarios<br>
		  <button class="button">Listar</button>
          </form>
		  <form action="DustyBookCadastroUsuarioForm.php" method="POST">
		  <p>Cadastrar Usuarios<br>
		  <button class="button">Cadastrar</button>
          </form>
          <form action="DustyBookSugestoesLista.php" method="POST">
		  <p>Sugestoes<br>
		  <button class="button">Listar</button>
          </form>		  
		  <form action="DustyBookLogout.php" method="POST">
		  <button class="button">Sair</button>
          </form>		  

   </div>
    <div class="grid-item item8">
   
   <?php
   
  
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		$result_pg = 5;
		$inicio = ($result_pg * $pagina) - $result_pg;
		
		$pesquisa= "SELECT *FROM usuarios LIMIT $inicio,$result_pg";
		$array_pesquisa=mysqli_query($link,$pesquisa);
		while ($row_user = mysqli_fetch_object($array_pesquisa)){
			$foto= "fotousers/".$row_user->foto; 
		    echo '<br >';
			echo "<table >";
            echo "<tr>"	;
			echo "<td rowspan='4' ><img src= '$foto' alt='$row_user->foto' width='200' height='150'  /><td></td>";
			echo "<td>ID:<td>$row_user->id </td></tr>";
			echo "<tr><td>Nome :<td> $row_user->nome</td></tr>";
            echo "<tr><td>Sobrenome:<td> $row_user->sobrenome </td></tr>";
            echo "<tr><td>Email<td>$row_user->email</td></tr>";
			echo "</table>";
			echo'<form action="DustyBookDeletaConta.php" method="POST">';
			echo '<input class="submit" type="hidden" name="id" value="'.$row_user->id.'"/>';
			echo '<input type="submit" value="Excluir"><hr>';
			echo '</form>';
			echo '<br >';
		}
			
			//Paginção 
		$quantidade_rg = "SELECT COUNT(id) AS num_result FROM usuarios";
		$total_rg = mysqli_query($link, $quantidade_rg);
	    $row_rg = mysqli_fetch_assoc($total_rg);
		$quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
		if($quantidade_pg > 1){
		$max_links = 2;
        echo "<a href='DustyBookListaUsuario.php?pagina=1'>Primeira</a> ";
        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if($pag_ant >= 1){echo "<a href='DustyBookListaUsuario.php?pagina=$pag_ant'>$pag_ant</a> ";}}
        echo "$pagina ";
        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $quantidade_pg){echo "<a href='DustyBookListaUsuario.php?pagina=$pag_dep'>$pag_dep</a> ";}}
        echo "<a href='DustyBookListaUsuario.php?pagina=$quantidade_pg'>Ultima</a>";}
		?>
</div>	
</body>
</html>	
		