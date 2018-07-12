<?php
include_once("DustyBookConexao.php");
session_start();
if(!isset($_SESSION['adm'])){
	    echo "<script>alert('Sem permissao de servidor!');";
		echo "location.href='DustyBookPaginaPrincipal.php'</script>";
   }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
 <title>Dusty Book/Lista Sugestoes</title>
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
    <li> <a href="DustyBookPesquisaComentarios.html"><b><font color="#ffffff">Dicas</font></b></a> </li>
	  <li> <a href="DustyBookSobre.html"><b><font color="#ffffff">Sobre</font></b></a></li>
	  <li><a href="DustyBookPesquisaSession2.php"><b><font color="#ffffff">Livros</font></b></a></li>
	  <li> <a href="DustyBookPaginaPrincipal.php"><b><font color="#ffffff">Home</font></b></a></li>
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
       $quantidade_elogio = "SELECT COUNT(tipo) AS num_result FROM sugestoes WHERE tipo = 'elogio'";
	   $total_elogio = mysqli_query($link, $quantidade_elogio);
	   $row_elogio = mysqli_fetch_assoc($total_elogio);
	   $quantidade_elogio = ceil($row_elogio['num_result']);	
	   $quantidade_reclamacao = "SELECT COUNT(tipo) AS num_result FROM sugestoes WHERE tipo = 'reclamacao'";
	   $total_reclamacao = mysqli_query($link, $quantidade_reclamacao);
	   $row_reclamacao = mysqli_fetch_assoc($total_reclamacao);
	   $quantidade_reclamacao = ceil($row_reclamacao['num_result']);
	   echo "elogios: ",$quantidade_elogio,"  Reclamacoes: ",$quantidade_reclamacao,"<br>","<br>";
   
  
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		$result_pg = 5;
		$inicio = ($result_pg * $pagina) - $result_pg;
		
		$pesquisa= "SELECT *FROM sugestoes ORDER BY status ASC LIMIT $inicio,$result_pg";
		$array_pesquisa=mysqli_query($link,$pesquisa);
		while ($row_sugestoes = mysqli_fetch_object($array_pesquisa)){
			echo "Sugestao numero:",$row_sugestoes->id ,"<br>";
			echo "Nome:",           $row_sugestoes->nome ,"<br>";
            echo "Status: ",        $row_sugestoes->status ,"<br>";
			echo "Tipo: ",        $row_sugestoes->tipo ,"<br>";
			echo'<form action="DustyBookDescricaoSugestao.php" method="POST">';
			echo '<input class="submit" type="hidden" name="id" value="'.$row_sugestoes->id.'"/>';
			echo '<input type="submit" value="Detalhes"><hr>';
			echo '</form>';	
		}
			
			//Paginção 
		$quantidade_rg = "SELECT COUNT(tipo) AS num_result FROM sugestoes";
		$total_rg = mysqli_query($link, $quantidade_rg);
	    $row_rg = mysqli_fetch_assoc($total_rg);
		$quantidade_pg = ceil($row_rg['num_result'] / $result_pg);	
		if($quantidade_pg > 1){
		$max_links = 2;
        echo "<a href='DustyBookSugestoesLista.php?pagina=1'>Primeira</a> ";
        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if($pag_ant >= 1){echo "<a href='DustyBookSugestoesLista.php?pagina=$pag_ant'>$pag_ant</a> ";}}
        echo "$pagina ";
        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $quantidade_pg){echo "<a href='DustyBookSugestoesLista.php?pagina=$pag_dep'>$pag_dep</a> ";}}
        echo "<a href='DustyBookSugestoesLista.php?pagina=$quantidade_pg'>Ultima</a>";}
		?>
</div>	
</body>
</html>	
		