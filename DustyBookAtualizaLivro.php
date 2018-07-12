<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
	    echo "<script>alert('Sessao nao iniciada!');";
		echo "location.href='DustyBookPaginaPrincipal.php'</script>";
   }
$id=$_POST['id'];

include_once("DustyBookConexao.php");

$nomel=$_POST['nomel'];
$autorl=$_POST['autorl'];
$edl=$_POST['edl'];
$valorl=$_POST['valorl'];
$material=$_POST['material'];
$temal=$_POST['temal'];
$comentariol=$_POST['comentariol'];
$anoedl=$_POST['anoedl'];
$fotol = $_FILES['fotol']['tmp_name'];
$iduser=$_SESSION['id_usuario'];

if(isset($_FILES['fotol'])){
	$extensao = strtolower(substr($_FILES['fotol']['name'],-4));
	$novo_nome = (time()).$iduser.$extensao;
	$diretorio = "fotos/";
	move_uploaded_file($_FILES['fotol']['tmp_name'],$diretorio.$novo_nome);	
	$atualiza="UPDATE livros SET fotol ='$novo_nome' WHERE id_livro ='$id'";
	$retorno = mysqli_query($link,$atualiza);
}

if($nomel != NULL){
	$atualiza="UPDATE livros SET nomel ='$nomel' WHERE id_livro ='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($autorl != NULL){
	$atualiza="UPDATE livros SET autorl ='$autorl' WHERE id_livro ='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($edl != NULL){
	$atualiza="UPDATE livros SET edl ='$edl' WHERE id_livro ='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($valorl != NULL){
	$atualiza="UPDATE livros SET valorl ='$valorl' WHERE id_livro ='$id'";
	$retorno = mysqli_query($link,$atualiza);
}

if($material != NULL){
	$atualiza="UPDATE livros SET material ='$material' WHERE id_livro ='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($temal != NULL){
	$atualiza="UPDATE livros SET temal ='$temal' WHERE id_livro ='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($comentariol != NULL){
	$atualiza="UPDATE livros SET comentariol ='$comentariol' WHERE id_livro ='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($anoedl != NULL){
	$atualiza="UPDATE livros SET anoedl ='$anoedl' WHERE id_livro ='$id'";
	$retorno = mysqli_query($link,$atualiza);
}

session_start();
$_SESSION['temp']=$id;

  echo "<script>alert('Dados Atualizados.');";
  echo "location.href='DustyBookDescricaoLivro.php'</script>";



?>