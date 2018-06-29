<?php
include_once("DustyBookConexao.php");
?> 

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8"/>
 <title>Dusty Book/PesquisaComentario</title>
 <link rel="stylesheet" type="text/css" href ="DustyBook.css" />
 </head>
<body>
<div class="grid-container">
  
  <div class="grid-item item1">
  <a href="" target="_blank"><img width="230px" height="200px" src="https://scontent.fmcz3-1.fna.fbcdn.net/v/t1.0-9/33384816_2017400728333279_2452622180819664896_n.jpg?_nc_cat=0&oh=d734f9cea5825a08c7689c687e3e2abc&oe=5B821AD1"></a>
  
  </div>
  
  <div class="grid-item item2">
   <ul>
      <li> <a href="DustyBookDescricaoUsuario.php" target="_blank">Meus Dados</a> </li>
	  <li> <a href="DustyBookSobre.html" target="_blank">Sobre</a></li>
	  <li> <a href="DustyBookPesquisa.html" target="_blank">Livros</a> </li>
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
   
   <div class="grid-item item8">
          
	 <?php
	     $materia=$_POST['materia'];
		
		//paginacao
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//resultados por pagina
		$result_pg = 5;
		
		//calcula qual ememento do array começa a pagina
		$inicio = ($result_pg * $pagina) - $result_pg;
		
		 
		//pesquisa geral
		$pesquisa= "SELECT *FROM livros WHERE material LIKE '%".$materia."%' LIMIT $inicio,$result_pg";
		$array_pesquisa=mysqli_query($link,$pesquisa);
		
		if($array_pesquisa==NULL){
		 echo "<script>alert('Materia sem livros ou comentarios!');";
         echo "location.href='DustyBookPaginaPrincipal.html'</script>"; 
			
		}else{
		 while ($row_livro = mysqli_fetch_object($array_pesquisa)){
		    echo "comentario:  ",$row_livro->comentariol,"<br>";
		    echo "<img src=".$row_livro->fotol. " width='85' height='85'  /><br />";
			echo "livro:",       $row_livro->nomel ,"<br>";
            echo "autor:  "   ,  $row_livro->autorl ,"<br>";
            echo "edicao:  "  ,  $row_livro->edl    ,"<br>";
            echo "valor:  "  ,   $row_livro->valorl ,"<br>";
			echo'<form action="DustyBookDescricaoLivro.php" method="POST">';
			echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
			echo '<input type="submit" value="Detalhes"><hr>';
			echo '</form>';
			
		}}
			
	     //Paginção - Somar a quantidade de registros
		$quantidade_rg = "SELECT COUNT(id_livro) AS num_result FROM livros";
		$total_rg = mysqli_query($link, $quantidade_rg);
		$row_rg = mysqli_fetch_assoc($total_rg);
		
		$quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
 
        echo "<br><br>";
        
 
         //dispor e limitar os link antes depois
		$max_links = 2;
		echo "<a href='DustyBookPesquisaComentarios.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='DustyBookPesquisaComentarios.php?pagina=$pag_ant'>$pag_ant</a> ";}}
		
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='DustyBookPesquisaComentarios.php?pagina=$pag_dep'>$pag_dep</a> ";}}
		
		echo "<a href='DustyBookPesquisaComentarios.php?pagina=$quantidade_pg'>Ultima</a>";		

		

	?>	
	   <br><br>
   </div>
   
   </body>
</html>