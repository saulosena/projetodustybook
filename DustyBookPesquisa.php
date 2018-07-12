<?php
include_once("DustyBookConexao.php");
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
 <title>Dusty Book/Pesquisa</title>
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
  <div class="grid-item item8">
   
   <?php
   
     session_start();
	 
     $nome=$_SESSION['nomel'];
     $materia=$_SESSION['material'];
     $autor=$_SESSION['autorl'];
   
   
       //paginacao
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//resultados por pagina
		$result_pg = 8;
		
		//calcula qual elemento do array começa a pagina
		$inicio = ($result_pg * $pagina) - $result_pg;
		
		 if($nome==NULL AND $materia==NULL AND $autor==NULL){		
		//pesquisa geral
		$pesquisa= "SELECT *FROM livros LIMIT $inicio,$result_pg";
		$array_pesquisa=mysqli_query($link,$pesquisa);
		while ($row_livro = mysqli_fetch_object($array_pesquisa)){
			$foto= "fotos/".$row_livro->fotol; 
			echo '<br>';
		    echo "<table >";
            echo "<tr>"	;		
		    echo "<td rowspan='5' ><img src= '$foto' alt='$row_livro->fotol' width='200' height='150'  /><td></td>";
			echo "<td>Dados:<td>Livro:<td>$row_livro->nomel</td></tr>";
            echo "<tr><td><td><td>Autor  :<td>$row_livro->autorl </td></tr>";
            echo "<tr><td><td><td>Edicao   :<td>$row_livro->edl </td></tr>";
            echo "<tr><td><td><td>Valor  :<td>$row_livro->valorl </td></tr>";
			 echo "<tr><td><td><td>Materia  :<td>$row_livro->material </td></tr>";
			echo "<tr><td colspan='5'>comentarios :$row_livro->comentariol </td></tr>";
		    echo "</table>";
			echo '<ul>';
            echo '<li>';
            echo'<form action="DustyBookDescricaoLivro.php" method="POST">';
		    echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
			echo '<input type="submit" value="Detalhes"><hr>';
			echo '</form>';
			echo '</li>';
            echo '<li>';
			  if(isset($_SESSION['adm'])){
		        echo'<form action="DustyBookDeletaLivro.php" method="POST">';
				echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
				echo '<input type="submit" value="Excluir"><hr>';
				echo '</form>';}
			echo '</ul>';
			echo '</li>';
            echo '<br>';			
		}
			
	     //Paginção - 
		$quantidade_rg = "SELECT COUNT(id_livro) AS num_result FROM livros";
		$total_rg = mysqli_query($link, $quantidade_rg);
		$row_rg = mysqli_fetch_assoc($total_rg);
		$quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
        $max_links = 2;
		echo "<a href='DustyBookPesquisa.php?pagina=1'>Primeira</a> ";
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
	    if($pag_ant >= 1){echo "<a href='DustyBookPesquisa.php?pagina=$pag_ant'>$pag_ant</a> ";}}
		echo "$pagina ";
	    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
		if($pag_dep <= $quantidade_pg){echo "<a href='DustyBookPesquisa.php?pagina=$pag_dep'>$pag_dep</a> ";}}
		echo "<a href='DustyBookPesquisa.php?pagina=$quantidade_pg'>Ultima</a>";

		
               }elseif($nome != NULL AND $materia != NULL AND $autor != NULL ){// pesquisa nome materia e autor
					$pesquisa= "SELECT *FROM livros WHERE (nomel LIKE '%".$nome."%')AND (material  LIKE '%".$materia."%') AND (autorl LIKE '%".$autor."%') LIMIT $inicio,$result_pg";
		               $array_pesquisa=mysqli_query($link,$pesquisa);
						      while ($row_livro = mysqli_fetch_object($array_pesquisa)){
								$foto= "fotos/".$row_livro->fotol;   
								echo '<br>';
		                        echo "<table >";
                                echo "<tr>"	;		
		                        echo "<td rowspan='5' ><img src= '$foto' alt='$row_livro->fotol' width='200' height='150'  /><td></td>";
		                    	echo "<td>Dados:<td>Livro:<td>$row_livro->nomel</td></tr>";
								echo "<tr><td><td><td>Autor  :<td>$row_livro->autorl </td></tr>";
								echo "<tr><td><td><td>Edicao   :<td>$row_livro->edl </td></tr>";
								echo "<tr><td><td><td>Valor  :<td>$row_livro->valorl </td></tr>";
								echo "<tr><td><td><td>Materia :<td>$row_livro->material </td></tr>";
								echo "<tr><td colspan='5'>comentarios :$row_livro->comentariol </td></tr>";
								echo "</table>";
								echo '<ul>';
                                echo '<li>';
								echo'<form action="DustyBookDescricaoLivro.php" method="POST">';
								echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
								echo '<input type="submit" value="Detalhes"><hr>';
								echo '</form>';
								echo '</li>';
                                echo '<li>';
								 if(isset($_SESSION['adm'])){
		                        	    echo'<form action="DustyBookDeletaLivro.php" method="POST">';
			                            echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
			                            echo '<input type="submit" value="Excluir"><hr>';
			                            echo '</form>';
									}
								echo '</ul>';
                                echo '</li>';
                                echo '<br>';								
							    }
								$quantidade_rg = "SELECT COUNT(id_livro) AS num_result FROM livros WHERE (nomel LIKE '%".$nome."%')AND (material  LIKE '%".$materia."%') AND (autorl LIKE '%".$autor."%') ";
		                        $total_rg = mysqli_query($link, $quantidade_rg);
		                        $row_rg = mysqli_fetch_assoc($total_rg);
		                        $quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
                                if($quantidade_pg > 1){
		                        $max_links = 2;
		                        echo "<a href='DustyBookPesquisa.php?pagina=1'>Primeira</a> ";
		                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		                        if($pag_ant >= 1){echo "<a href='DustyBookPesquisa.php?pagina=$pag_ant'>$pag_ant</a> ";}}
		                        echo "$pagina ";
	                            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			                    if($pag_dep <= $quantidade_pg){echo "<a href='DustyBookPesquisa.php?pagina=$pag_dep'>$pag_dep</a> ";}}
		                        echo "<a href='DustyBookPesquisa.php?pagina=$quantidade_pg'>Ultima</a>";}
						if($quantidade_pg < 1){
						        echo "<script>alert('Sem livros com esses parametros!');";
                                echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 
								}
								 
				}elseif ($nome != NULL AND $materia!=NULL) {//pesquisa nome e materia
					$pesquisa= "SELECT *FROM livros WHERE( nomel LIKE '%".$nome."%')AND (material  LIKE '%".$materia."%' )LIMIT $inicio,$result_pg";
		               $array_pesquisa=mysqli_query($link,$pesquisa);
						      while ($row_livro = mysqli_fetch_object($array_pesquisa)){
								$foto= "fotos/".$row_livro->fotol;   
		                        echo '<br>';
								echo "<table >";
                                echo "<tr>"	;		
		                        echo "<td rowspan='5' ><img src= '$foto' alt='$row_livro->fotol' width='200' height='150'  /><td></td>";
		                    	echo "<td>Dados:<td>Livro:<td>$row_livro->nomel</td></tr>";
								echo "<tr><td><td><td>Autor  :<td>$row_livro->autorl </td></tr>";
								echo "<tr><td><td><td>Edicao   :<td>$row_livro->edl </td></tr>";
								echo "<tr><td><td><td>Valor  :<td>$row_livro->valorl </td></tr>";
								echo "<tr><td><td><td>Materia  :<td>$row_livro->material </td></tr>";
								echo "<tr><td colspan='5'>comentarios :$row_livro->comentariol </td></tr>";
								echo "</table>";
								echo '<ul>';
                                echo '<li>';
								echo'<form action="DustyBookDescricaoLivro.php" method="POST">';
								echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
								echo '<input type="submit" value="Detalhes"><hr>';
								echo '</form>';
								echo '</li>';
                                echo '<li>';
								 if(isset($_SESSION['adm'])){
		                        	    echo'<form action="DustyBookDeletaLivro.php" method="POST">';
			                            echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
			                            echo '<input type="submit" value="Excluir"><hr>';
			                            echo '</form>';
									}
								echo '</ul>';
                                echo '</li>';
								echo '<br>';
								}
                                $quantidade_rg = "SELECT COUNT(id_livro) AS num_result FROM livros WHERE (nomel LIKE '%".$nome."%')AND (material  LIKE '%".$materia."%')  ";
		                        $total_rg = mysqli_query($link, $quantidade_rg);
		                        $row_rg = mysqli_fetch_assoc($total_rg);
		                        $quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
		                        if($quantidade_pg > 1){
								$max_links = 2;
		                        echo "<a href='DustyBookPesquisa.php?pagina=1'>Primeira</a> ";
		                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		                        if($pag_ant >= 1){echo "<a href='DustyBookPesquisa.php?pagina=$pag_ant'>$pag_ant</a> ";}}
		                        echo "$pagina ";
	                            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			                    if($pag_dep <= $quantidade_pg){echo "<a href='DustyBookPesquisa.php?pagina=$pag_dep'>$pag_dep</a> ";}}
		                        echo "<a href='DustyBookPesquisa.php?pagina=$quantidade_pg'>Ultima</a>";}
						if($quantidade_pg < 1){
						        echo "<script>alert('Sem livros com esses parametros!');";
                                echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 
								}
			}elseif($nome !=NULL AND $autor != NULL){//pesquisa nome e autor
					$pesquisa= "SELECT *FROM livros WHERE (nomel LIKE '%".$nome."%') AND( autorl LIKE '%".$autor."%') LIMIT $inicio,$result_pg";
		               $array_pesquisa=mysqli_query($link,$pesquisa);
						      while ($row_livro = mysqli_fetch_object($array_pesquisa)){
								$foto= "fotos/".$row_livro->fotol;   
		                        echo '<br>';
								echo "<table >";
                                echo "<tr>"	;		
		                        echo "<td rowspan='5' ><img src= '$foto' alt='$row_livro->fotol' width='200' height='150'  /><td></td>";
		                    	echo "<td>Dados:<td>Livro:<td>$row_livro->nomel</td></tr>";
								echo "<tr><td><td><td>Autor  :<td>$row_livro->autorl </td></tr>";
								echo "<tr><td><td><td>Edicao   :<td>$row_livro->edl </td></tr>";
								echo "<tr><td><td><td>Valor  :<td>$row_livro->valorl </td></tr>";
								echo "<tr><td><td><td>Materia  :<td>$row_livro->material </td></tr>";
								echo "<tr><td colspan='5'>comentarios :$row_livro->comentariol </td></tr>";
								echo "</table>";
								echo '<ul>';
                                echo '<li>';
								echo'<form action="DustyBookDescricaoLivro.php" method="POST">';
								echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
								echo '<input type="submit" value="Detalhes"><hr>';
								echo '</form>';
								echo '</li>';
                                echo '<li>';
								 if(isset($_SESSION['adm'])){
		                        	    echo'<form action="DustyBookDeletaLivro.php" method="POST">';
			                            echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
			                            echo '<input type="submit" value="Excluir"><hr>';
			                            echo '</form>';
									}
								echo '</ul>';
                                echo '</li>';
								echo '<br>';
								}
								$quantidade_rg = "SELECT COUNT(id_livro) AS num_result FROM livros WHERE (nomel LIKE '%".$nome."%')AND (autorl  LIKE '%".$autor."%') ";
		                        $total_rg = mysqli_query($link, $quantidade_rg);
							    $row_rg = mysqli_fetch_assoc($total_rg);
		                        $quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
		                        if($quantidade_pg > 1){
								$max_links = 2;
		                        echo "<a href='DustyBookPesquisa.php?pagina=1'>Primeira</a> ";
		                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		                        if($pag_ant >= 1){echo "<a href='DustyBookPesquisa.php?pagina=$pag_ant'>$pag_ant</a> ";}}
		                        echo "$pagina ";
	                            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			                    if($pag_dep <= $quantidade_pg){echo "<a href='DustyBookPesquisa.php?pagina=$pag_dep'>$pag_dep</a> ";}}
		                        echo "<a href='DustyBookPesquisa.php?pagina=$quantidade_pg'>Ultima</a>";}
						if($quantidade_pg < 1){
						        echo "<script>alert('Sem livros com esses parametros!');";
                                echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 
								}
			
			}elseif($nome != NULL ){// pesquisa nome
				         $pesquisa= "SELECT *FROM livros WHERE nomel LIKE '%".$nome."%' LIMIT $inicio,$result_pg";
		                 $array_pesquisa=mysqli_query($link,$pesquisa);
						      while ($row_livro = mysqli_fetch_object($array_pesquisa)){
								$foto= "fotos/".$row_livro->fotol;   
		                        echo '<br>';
								echo "<table >";
                                echo "<tr>"	;		
		                        echo "<td rowspan='5' ><img src= '$foto' alt='$row_livro->fotol' width='200' height='150'  /><td></td>";
		                    	echo "<td>Dados:<td>Livro:<td>$row_livro->nomel</td></tr>";
								echo "<tr><td><td><td>Autor  :<td>$row_livro->autorl </td></tr>";
								echo "<tr><td><td><td>Edicao   :<td>$row_livro->edl </td></tr>";
								echo "<tr><td><td><td>Valor  :<td>$row_livro->valorl </td></tr>";
								echo "<tr><td><td><td>Materia  :<td>$row_livro->material </td></tr>";
								echo "<tr><td colspan='5'>comentarios :$row_livro->comentariol </td></tr>";
								echo "</table>";
								echo '<ul>';
                                echo '<li>';
								echo'<form action="DustyBookDescricaoLivro.php" method="POST">';
								echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
								echo '<input type="submit" value="Detalhes"><hr>';
								echo '</form>';
								echo '</li>';
                                echo '<li>';
								 if(isset($_SESSION['adm'])){
		                        	    echo'<form action="DustyBookDeletaLivro.php" method="POST">';
			                            echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
			                            echo '<input type="submit" value="Excluir"><hr>';
			                            echo '</form>';
									}
								echo '</ul>';
                                echo '</li>';	
								echo '<br>';
								}
                                $quantidade_rg = "SELECT COUNT(id_livro) AS num_result FROM livros WHERE (nomel LIKE '%".$nome."%')";
								$total_rg = mysqli_query($link, $quantidade_rg);
		                        $row_rg = mysqli_fetch_assoc($total_rg);
		                        $quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
								if($quantidade_pg > 1){
		                        $max_links = 2;
		                        echo "<a href='DustyBookPesquisa.php?pagina=1'>Primeira</a> ";
		                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		                        if($pag_ant >= 1){echo "<a href='DustyBookPesquisa.php?pagina=$pag_ant'>$pag_ant</a> ";}}
		                        echo "$pagina ";
	                            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			                    if($pag_dep <= $quantidade_pg){echo "<a href='DustyBookPesquisa.php?pagina=$pag_dep'>$pag_dep</a> ";}}
		                        echo "<a href='DustyBookPesquisa.php?pagina=$quantidade_pg'>Ultima</a>";}
						if($quantidade_pg < 1){
						        echo "<script>alert('Sem livros com esses parametros!');";
                                echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 
								}
			}elseif($materia != NULL AND $autor!=NULL ){// pesquisa  materia e autor
					$pesquisa= "SELECT *FROM livros WHERE ( material  LIKE '%".$materia."%' AND autorl LIKE '%".$autor."%') LIMIT $inicio,$result_pg";
		               $array_pesquisa=mysqli_query($link,$pesquisa);
						      while ($row_livro = mysqli_fetch_object($array_pesquisa)){
								$foto= "fotos/".$row_livro->fotol;   
		                        echo '<br>';
								echo "<table >";
                                echo "<tr>"	;		
		                        echo "<td rowspan='5' ><img src= '$foto' alt='$row_livro->fotol' width='200' height='150'  /><td></td>";
		                    	echo "<td>Dados:<td>Livro:<td>$row_livro->nomel</td></tr>";
								echo "<tr><td><td><td>Autor  :<td>$row_livro->autorl </td></tr>";
								echo "<tr><td><td><td>Edicao   :<td>$row_livro->edl </td></tr>";
								echo "<tr><td><td><td>Valor  :<td>$row_livro->valorl </td></tr>";
								echo "<tr><td><td><td>Materia  :<td>$row_livro->material </td></tr>";
								echo "<tr><td colspan='5'>comentarios :$row_livro->comentariol </td></tr>";
								echo "</table>";
								echo '<ul>';
                                echo '<li>';
								echo'<form action="DustyBookDescricaoLivro.php" method="POST">';
								echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
								echo '<input type="submit" value="Detalhes"><hr>';
								echo '</form>';
								echo '</li>';
                                echo '<li>';
								 if(isset($_SESSION['adm'])){
		                        	    echo'<form action="DustyBookDeletaLivro.php" method="POST">';
			                            echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
			                            echo '<input type="submit" value="Excluir"><hr>';
			                            echo '</form>';
									}
								echo '</ul>';
                                echo '</li>';	
								echo '<br>';
								}
								$quantidade_rg = "SELECT COUNT(id_livro) AS num_result FROM livros WHERE (material LIKE '%".$materia."%')AND (autorl  LIKE '%".$autor."%') ";
		                        $total_rg = mysqli_query($link, $quantidade_rg);
		                        $row_rg = mysqli_fetch_assoc($total_rg);
		                        $quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
								if($quantidade_pg > 1){
		                        $max_links = 2;
		                        echo "<a href='DustyBookPesquisa.php?pagina=1'>Primeira</a> ";
		                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		                        if($pag_ant >= 1){echo "<a href='DustyBookPesquisa.php?pagina=$pag_ant'>$pag_ant</a> ";}}
		                        echo "$pagina ";
	                            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			                    if($pag_dep <= $quantidade_pg){echo "<a href='DustyBookPesquisa.php?pagina=$pag_dep'>$pag_dep</a> ";}}
		                        echo "<a href='DustyBookPesquisa.php?pagina=$quantidade_pg'>Ultima</a>";}
						       if($quantidade_pg < 1){
						        echo "<script>alert('Sem livros com esses parametros!');";
                                echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 
								}
		    }elseif($materia!=NULL) {//pesquisa materia
					$pesquisa= "SELECT *FROM livros WHERE material  LIKE '%".$materia."%' LIMIT $inicio,$result_pg";
		               $array_pesquisa=mysqli_query($link,$pesquisa);
						      while ($row_livro = mysqli_fetch_object($array_pesquisa)){
								$foto= "fotos/".$row_livro->fotol;   
		                        echo '<br>';
								echo "<table >";
                                echo "<tr>"	;		
		                        echo "<td rowspan='5' ><img src= '$foto' alt='$row_livro->fotol' width='200' height='150'  /><td></td>";
		                    	echo "<td>Dados:<td>Livro:<td>$row_livro->nomel</td></tr>";
								echo "<tr><td><td><td>Autor  :<td>$row_livro->autorl </td></tr>";
								echo "<tr><td><td><td>Edicao   :<td>$row_livro->edl </td></tr>";
								echo "<tr><td><td><td>Valor  :<td>$row_livro->valorl </td></tr>";
								echo "<tr><td><td><td>Materia  :<td>$row_livro->material </td></tr>";
								echo "<tr><td colspan='5'>comentarios :$row_livro->comentariol </td></tr>";
								echo "</table>";
								echo '<ul>';
                                echo '<li>';
								echo'<form action="DustyBookDescricaoLivro.php" method="POST">';
								echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
								echo '<input type="submit" value="Detalhes"><hr>';
								echo '</form>';
								echo '</li>';
                                echo '<li>';
								 if(isset($_SESSION['adm'])){
		                        	    echo'<form action="DustyBookDeletaLivro.php" method="POST">';
			                            echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
			                            echo '<input type="submit" value="Excluir"><hr>';
			                            echo '</form>';
									}
								echo '</ul>';
                                echo '</li>';
								echo '<br>';
								}	
                                $quantidade_rg = "SELECT COUNT(id_livro) AS num_result FROM livros WHERE (material  LIKE '%".$materia."%')  ";
		                        $total_rg = mysqli_query($link, $quantidade_rg);
		                        $row_rg = mysqli_fetch_assoc($total_rg);
		                        $quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
								if($quantidade_pg > 1){
		                        $max_links = 2;
		                        echo "<a href='DustyBookPesquisa.php?pagina=1'>Primeira</a> ";
		                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		                        if($pag_ant >= 1){echo "<a href='DustyBookPesquisa.php?pagina=$pag_ant'>$pag_ant</a> ";}}
		                        echo "$pagina ";
	                            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			                    if($pag_dep <= $quantidade_pg){echo "<a href='DustyBookPesquisa.php?pagina=$pag_dep'>$pag_dep</a> ";}}
		                        echo "<a href='DustyBookPesquisa.php?pagina=$quantidade_pg'>Ultima</a>";}
						       if($quantidade_pg < 1){
						        echo "<script>alert('Sem livros com esses parametros!');";
                                echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 
								}
								
			}elseif($autor != NULL){// pesquisa autor
				         $pesquisa= "SELECT *FROM livros WHERE (autorl LIKE '%".$autor."%' )LIMIT $inicio,$result_pg";
		                 $array_pesquisa=mysqli_query($link,$pesquisa);
						      while ($row_livro = mysqli_fetch_object($array_pesquisa)){
								$foto= "fotos/".$row_livro->fotol;   
		                        echo '<br>';
								echo "<table >";
                                echo "<tr>"	;		
		                        echo "<td rowspan='5' ><img src= '$foto' alt='$row_livro->fotol' width='200' height='150'  /><td></td>";
		                    	echo "<td>Dados:<td>Livro:<td>$row_livro->nomel</td></tr>";
								echo "<tr><td><td><td>Autor  :<td>$row_livro->autorl </td></tr>";
								echo "<tr><td><td><td>Edicao   :<td>$row_livro->edl </td></tr>";
								echo "<tr><td><td><td>Valor  :<td>$row_livro->valorl </td></tr>";
								echo "<tr><td><td><td>Materia  :<td>$row_livro->material </td></tr>";
								echo "<tr><td colspan='5'>comentarios :$row_livro->comentariol </td></tr>";
								echo "</table>";
								echo '<ul>';
                                echo '<li>';
								echo'<form action="DustyBookDescricaoLivro.php" method="POST">';
								echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
								echo '<input type="submit" value="Detalhes"><hr>';
								echo '</form>';
								echo '</li>';
                                echo '<li>';
								 if(isset($_SESSION['adm'])){
		                        	    echo'<form action="DustyBookDeletaLivro.php" method="POST">';
			                            echo '<input class="submit" type="hidden" name="id" value="'.$row_livro->id_livro.'"/>';
			                            echo '<input type="submit" value="Excluir"><hr>';
			                            echo '</form>';
									}
								echo '</ul>';
                                echo '</li>';
								echo '<br>';
								}
                                $quantidade_rg = "SELECT COUNT(id_livro) AS num_result FROM livros WHERE (material  LIKE '%".$autor."%')  ";
		                        $total_rg = mysqli_query($link, $quantidade_rg);
		                        $row_rg = mysqli_fetch_assoc($total_rg);
		                        $quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
								if($quantidade_pg > 1){
		                        $max_links = 2;
		                        echo "<a href='DustyBookPesquisa.php?pagina=1'>Primeira</a> ";
		                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		                        if($pag_ant >= 1){echo "<a href='DustyBookPesquisa.php?pagina=$pag_ant'>$pag_ant</a> ";}}
		                        echo "$pagina ";
	                            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			                    if($pag_dep <= $quantidade_pg){echo "<a href='DustyBookPesquisa.php?pagina=$pag_dep'>$pag_dep</a> ";}}
		                        echo "<a href='DustyBookPesquisa.php?pagina=$quantidade_pg'>Ultima</a>";}
						if($quantidade_pg < 1){
						        echo "<script>alert('Sem livros com esses parametros!');";
                                echo "location.href='DustyBookPaginaPrincipal.php'</script>"; 
								}
				
			        }

	?>	
   </div>
   </div>
   
   </body>
</html>
