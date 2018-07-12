<?php
include_once("DustyBookConexao.php");
session_start();
if(!isset($_SESSION['id_usuario'])){
	    echo "<script>alert('Sessao nao iniciada!');";
		echo "location.href='DustyBookPaginaPrincipal.php'</script>";
   }elseif(isset($_SESSION['id_usuario'])){


$id=$_SESSION['id_usuario'];


$complemento= $_POST['complemento'];
$sexo =$_POST['sexo'];
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$data=$_POST['data,nasc'];
$telefone1=$_POST['telefone1'];
$telefone2=$_POST['telefone2'];
$endereco=$_POST['endereco'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$cep=$_POST['cep'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$confirsenha=$_POST['confirsenha'];
$imagem=$_FILES['foto']['tmp_name'];

if($imagem =! NULL){
	$tipo = strtolower(substr($_FILES['imagem']['name'],-4));
	$nome_foto = (time()).$id.$tipo;
	$destino = 'fotousers/';
	move_uploaded_file($_FILES['imagem']['tmp_name'],$destino.$nome_foto);
	$atualiza="UPDATE usuarios SET foto ='$nome_foto' WHERE id ='$id'";
	$retorno = mysqli_query($link,$atualiza);
	
   }

if($sexo != NULL){
	$sexo =strtolower($sexo);
	$atualiza="UPDATE usuarios SET sexo ='$sexo' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}

if($nome != NULL){
	$nome =strtolower($nome);
	$atualiza="UPDATE usuarios SET nome ='$nome' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
	$_SESSION['nome'] = $nome;
}

if($sobrenome != NULL){
	$sobrenome=strtolower($sobrenome);
	$atualiza="UPDATE usuarios SET sobrenome ='$sobrenome' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($data != NULL){
	$atualiza="UPDATE usuarios SET data_nasc ='$data' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($telefone1 != NULL){
	$atualiza="UPDATE usuarios SET telefone1 ='$telefone1' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($telefone2 != NULL){
	$atualiza="UPDATE usuarios SET telefone2 ='$telefone2' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($endereco != NULL){
	$endereco=strtolower($endereco);
	$atualiza="UPDATE usuarios SET endereco ='$endereco' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($numero != NULL){
	$atualiza="UPDATE usuarios SET numero_end ='$numero' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($cidade != NULL){
	$cidade=strtolower($cidade);
	$atualiza="UPDATE usuarios SET cidade ='$cidade' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($estado != NULL){
	$estado=strtolower($estado);
	$atualiza="UPDATE usuarios SET estado ='$estado' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($cep != NULL){
	$atualiza="UPDATE usuarios SET cep ='$cep' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($complemento != NULL){
	$complemento = strtolower($complemento);
	$atualiza="UPDATE usuarios SET complemento ='$complemento' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
}
if($senha != NULL){
	$senha=strtolower($senha);
    $confirsenha=strtolower($confirsenha);

	if ($senha != $confirsenha){
	//echo 'senha nao confere';
	echo "<script>alert('Senhas nao conferem.');";
    echo "location.href='DustyBookAtualizaCadastro.html'</script>";
	}else{
	$atualiza="UPDATE usuarios SET senha ='$senha' WHERE id='$id'";
	$retorno = mysqli_query($link,$atualiza);
	$_SESSION['senha'] = $senha;}
}
if($email != NULL){
	$email=strtolower($email);
	$check= "SELECT email FROM usuarios = $email ";
   if($check == $email){
	echo "<script>alert('Email ja cadastrado!');";
    echo "location.href='DustyBookAtualizaCadastro.html'</script>"; 
   }else{ 
    $atualiza="UPDATE usuarios SET sexo ='$sexo' WHERE id='$id'";
    $retorno = mysqli_query($link,$atualiza);
	$_SESSION['login'] = $email;}
}


    echo "<script>alert('Dados Atualizados.');";
    echo "location.href='DustyBookDescricaoUsuario.php'</script>";}
?>

