<?php

include_once("DustyBookConexao.php");

$id=$_POST['id'];
$status=$_POST['status'];

$atualiza="UPDATE sugestoes SET status ='$status' WHERE id ='$id'";
$retorno = mysqli_query($link,$atualiza);

session_start();
$_SESSION['temp']=$id;

echo "<script>alert('Dados Atualizados.');";
echo "location.href='DustyBookDescricaoSugestao.php'</script>";




?>