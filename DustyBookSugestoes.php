<?php
include_once("DustyBookConexao.php");

$nome=$_POST['nome'];
$email=$_POST['email'];
$comentario=$_POST['comentario'];


$query = "INSERT INTO sugestoes VALUES ('".$nome."','".$email."','".$comentario."')";

$inserir = mysqli_query($link,$query);
if ($inserir) {

echo "<script>alert('Sugestao Enviada!');";
echo "location.href='DustyBookPaginaPrincipal.html'</script>";
} else {
echo "<script>alert('Erro de envio.');";
echo "location.href='DustyBookCadastroLivro.html'</script>";
// Exibe dados sobre o erro:
//echo "Dados sobre o erro:" . mysql_error();
}



?>