
<?php
include_once("DustyBookConexao.php");
$nomel=$_POST['nomel'];
$autorl=$_POST['autorl'];
$edl=$_POST['edl'];
$valorl=$_POST['valorl'];
$material=$_POST['material'];
$temal=$_POST['temal'];
$comentariol=$_POST['comentariol'];
$anoedl=$_POST['anoedl'];
$idl = NULL;


	
	if(isset($_FILES['fotol'])){
	$extensao = strtolower(substr($_FILES['fotol']['name'],-4)); //capiturar extensao do arquivo pelo nome com apenas os 4 ultimos caracteres
	$nome_foto=md5(time()).$extensao; // redefine o nome do arquivo atraves do tempo com criptografia
	$diretorio="$ultimo_id.$nome_foto/"; // pasta aonde  vai salvar a foto 
	
move_uploaded_file($_FILES['fotol']['tmp_name'],$diretorio);} //efetua upload0
	
	

	$query = "INSERT INTO livros VALUES('".$nomel."','".$autorl."','".$edl."','".$valorl."','".$nome_foto."','".$material."','".$temal."','".$comentariol."','".$anoedl."','".$idl."')";

$inserir = mysqli_query($link,$query);
if ($inserir) {

echo "<script>alert('Livro cadastrado com  sucesso!');";
echo "location.href='DustyBookPaginaPrincipal.html'</script>";
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