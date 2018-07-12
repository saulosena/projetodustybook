
<?php
include_once("DustyBookConexao.php");
session_start();

$nomel=$_POST['nomel'];
$autorl=$_POST['autorl'];
$edl=$_POST['edl'];
$valorl=$_POST['valorl'];
$material=$_POST['material'];
$temal=$_POST['temal'];
$comentariol=$_POST['comentariol'];
$anoedl=$_POST['anoedl'];
$iduser = $_SESSION['id_usuario'];
$fotol = $_FILES['fotol']['tmp_name'];

if(isset($_FILES['fotol'])){
	$extensao = strtolower(substr($_FILES['fotol']['name'],-4));
	$novo_nome = (time()).$iduser.$extensao;
	$diretorio = "fotos/";
	
	move_uploaded_file($_FILES['fotol']['tmp_name'],$diretorio.$novo_nome);	
}

	
$query = "INSERT INTO livros (nomel, autorl, edl, valorl, fotol, material, temal, comentariol, anoedl, id_livro, id_usuario)
                      VALUES('".$nomel."','".$autorl."','".$edl."','".$valorl."','".$novo_nome."','".$material."','".$temal."','".$comentariol."','".$anoedl."', NULL ,'".$iduser."')";

$inserir = mysqli_query($link,$query);
if ($inserir) {

echo "<script>alert('Livro cadastrado com  sucesso!');";
echo "location.href='DustyBookPaginaPrincipal.php'</script>";
} else {
echo "<script>alert('livro nao cadastrado.');";
echo "location.href='DustyBookCadastroLivro.html'</script>";
// Exibe dados sobre o erro:
//echo "Dados sobre o erro:" . mysql_error();
}

//$ultimo_id = mysqli_insert_id($link);

//$_UP['pasta'] = 'livros/';//Pasta onde o arquivo vai ser salvo

//mkdir($_UP['pasta'], 0777);//criar pasta


?>