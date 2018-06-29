
<?php 
include_once("DustyBookConexao.php");
$nome=$_POST['nome,usuario'];
$sobrenome=$_POST['sobrenome,usuario'];
$data=$_POST['data,nasc'];
$telefone1=$_POST['telefone1,usuario'];
$telefone2=$_POST['telefone2,usuario'];
$endereco=$_POST['endereco,usuario'];
$numero=$_POST['numero,usuario'];
$cidade=$_POST['cidade,usuario'];
$estado=$_POST['estado,usuario'];
$cep=$_POST['cep,usuario'];
$email=$_POST['email,usuario'];
$senha=$_POST['senha,usuario'];
$confirsenha=$_POST['confirsenha,usuario'];
$id = NULL;

$check= "SELECT email FROM usuarios = $email ";
 if($check == $email){
	echo "<script>alert('Email ja cadastrado!');";
    echo "location.href='DustyBookCadastroUsuario.html'</script>"; 
	 
 }		




if ($senha != $confirsenha){
	//echo 'senha nao confere';
	echo "<script>alert('Senhas nao conferem.');";
    echo "location.href='DustyBookCadastroUsuario.html'</script>";
	}

$query = "INSERT INTO usuarios VALUES('".$nome."','".$sobrenome."','".$id."','".$data."','".$telefone1."','".$telefone2."','".$endereco."','".$numero."','".$cidade."','".$estado."','".$cep."','".$email."','".$senha."')";

$inserir = mysqli_query($link,$query);
if ($inserir) {
echo "<script>alert('Cadastro realizado com sucesso.');";
echo "location.href='DustyBookPaginaPrincipal.html'</script>";
} else {
echo "<script>alert('usuario nao cadastrado.');";
echo "location.href='DustyBookCadastroUsuario.html'</script>";
// Exibe dados sobre o erro:
//echo "Dados sobre o erro:" . mysql_error();
}	
	




?>