<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8"/>
 <title>Dusty Book/Cadastro Usuario Usuarios</title>
 <link rel="stylesheet" type="text/css" href ="DustyBook.css">
 <link href="css/bootstrap.css" rel="stylesheet">
 </head>
<body>
<div class="grid-container">
  
  <div class="grid-item item10">Cadastro Usuario</div>
  <div class="grid-item item11">
  <form action="DustyBookCadastroUsuario.php" method="POST" enctype="multipart/form-data">
   <?php
		 session_start();
		 if(isset($_SESSION['adm'])){
		 
		 echo'<select name="adm" >';
         echo'<option type="radio" value= "0" > Usuario </option>';
         echo'<option type="radio" value= "1" > Administrador  </option>';
         echo'</select><br>';}
		 
		 ?>
         <br>
		 <br>
		 Nome:<br>
		 <input type="text" name="nome,usuario" required><br>
		 Sobre Nome:<br>
         <input type="text" name="sobrenome,usuario" required><br>
		 Data de Nascimento<br>
		 <input type="date" name="data,nasc"required><br>
		 Sexo:<br>
	    <select name="sexo" >
                       <option type="radio" value= "masculino" > MASCULINO </option>
                       <option type="radio" value= "feminino" > FEMININO  </option>
                     </select><br>
		 Telefone 1:<br>
         <input type="number" name="telefone1,usuario" required   min='10'  max="11"><br>	
		 Telefone 2:<br>
         <input type="number" name="telefone2,usuario" min='10'  max="11"><br>
		 Endereço:<br>
		 Rua:<br>
		 <input type="text" name="endereco,usuario" required><br>
		 Numero:<br>
		 <input type="number" name="numero,usuario" required min='1'  max="6"><br>
		 Complemento:<br>
         <input type="text" name="complemento,usuario" ><br>
		 Cidade:<br>
         <input type="text" name="cidade,usuario" required><br>	
         Estado:<br>
         <input type="text" name="estado,usuario" required><br>	
         Cep:<br>
         <input type="number" name="cep,usuario" required min='8'  max="8"><br>	
         Email:<br>
         <input type="text" name="email,usuario" required><br>			 
		 Senha:<br>
         <input type="password" name="senha,usuario" required><br>				 
		 Confirmar Senha:<br>
         <input type="password" name="confirsenha,usuario" required><br>
         Foto Usuario:<br>
		 <input type="file" name="imagem" required><br> 		 
		 <br>
		 <input type="submit" value="Cadastrar">
		 
   </form>
  
  <ul>
	  <li> <a href="DustyBookSobre.html" >Sobre</a></li>
	  <li> <a href="DustyBookPesquisa.php" >Livros</a> </li>
	  <li> <a href="DustyBookPaginaPrincipal.php" >Home </a></li>
	 </ul> 
  </div>
  
   
   </body>
</html>