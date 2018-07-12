
<?php 
include_once("DustyBookConexao.php");
$complemento=$_POST['complemento,usuario'];
$sexo =$_POST['sexo'];
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
$adm=$_POST['adm'];
$imagem=$_FILES['foto']['tmp_name'];


$complemento = strtolower($complemento);
$sexo =strtolower($sexo);
$nome =strtolower($nome);
$sobrenome=strtolower($sobrenome);
$endereco=strtolower($endereco);
$cidade=strtolower($cidade);
$estado=strtolower($estado);
$email=strtolower($email);
$senha=strtolower($senha);
$confirsenha=strtolower($confirsenha);






if($imagem =! NULL){
	$tipo = strtolower(substr($_FILES['imagem']['name'],-4));
	$nome_foto = (time()).$nome.$tipo;
	$destino = 'fotousers/';
	move_uploaded_file($_FILES['imagem']['tmp_name'],$destino.$nome_foto);
	
}


if($adm == NULL){
	$adm = 0;
}

$check= "SELECT email FROM usuarios = $email ";
 if($check == $email){
	echo "<script>alert('Email ja cadastrado!');";
    echo "location.href='DustyBookCadastroUsuarioForm.php'</script>"; 
	 
 }		
if ($senha != $confirsenha){
	echo "<script>alert('Senhas nao conferem.');";
    echo "location.href='DustyBookCadastroUsuarioForm.php'</script>";
	}
	
if(isset($complemento)){
	$complemento = NULL;
}
if(isset($telefone2)){
	$telefone2 = NULL;
}	

$query = "INSERT INTO usuarios (nome, sobrenome, id, data_nasc, telefone1, telefone2, endereco, numero_end, cidade, estado, cep, email, senha, complemento, sexo, adm, foto)
                         VALUES('".$nome."','".$sobrenome."','".$id."','".$data."','".$telefone1."','".$telefone2."','".$endereco."','".$numero."','".$cidade."','".$estado."','".$cep."','".$email."','".$senha."','".$complemento."','".$sexo."','".$adm."','".$nome_foto."')";

$inserir = mysqli_query($link,$query);
if ($inserir) {
echo "<script>alert('Cadastro realizado com sucesso.');";
echo "location.href='DustyBookPaginaPrincipal.php'</script>";
} else {
echo "<script>alert('usuario nao cadastrado.');";
echo "location.href='DustyBookCadastroUsuarioForm.php'</script>";
// Exibe dados sobre o erro:
//echo "Dados sobre o erro:" . mysql_error();
}
?>