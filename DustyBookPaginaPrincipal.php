<?php
include_once("DustyBookConexao.php");
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
 <title>Dusty Book</title>
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
   <li> <a href="DustyBookPaginaPrincipal.php"><b><font color="#ffffff">Home</font></b></a></li>
   <li><a href="DustyBookPesquisaSession2.php"><b><font color="#ffffff">Livros</font></b></a></li>
   <li> <a href="DustyBookPesquisaComentarioSession2.php"><b><font color="#ffffff">Dicas</font></b></a> </li>
   <li> <a href="DustyBookSobre.html"><b><font color="#ffffff">Sobre</font></b></a></li>
	  
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
  <div class="grid-item item4">
  <h1><b>Dusty book</b></h1>
  <h2><b>Nao sabe qual o melhor livro para estudar?</b></h2>
  <p>Se nao sabe que livro escolher para estudar; nos temos<br>
  as melhores dicas de pessoas que como voce nao sabia qual<br>
  o melhor livro pra comecar a estudar</p>
  <br>
  <br>
  <br>
   <form action="DustyBookPesquisaComentarioSession.php" method="POST">

		 <p>Digite a disciplina<br>
		 que mostraremos dicas de nossos usuarios</p>
		 <input type="text" name="materia" ><br><br>
		  <input type="submit" value="Pesquisar"><br>
          </form>
  </div>

  <div class="grid-item	item5">
  
  <?php
  session_start();
  //$_SESSION['login'];
 // $_SESSION['senha'];
 // $_SESSION['nome'];
  if(!isset($_SESSION['login'])) {
  ?>
        <form action="DustyBookLogin.php" method="POST">
		<b>Dustylogin</b><br><br>
		 <b>Email</b><br>
		 <input type="text" name="login" required><br>
		 <b>Senha</b><br>
		 <input type="password" name="senha"required><br>
		 <button class="button">Entrar</button>
   </form><br>
		 <form action="DustyBookCadastroUsuarioForm.php" method="POST">
		 <p>Cadastre-se agora e aproveite<br>as melhores ofertas do<br>
		 <b>Dusty Book!</b><br>
		  <button class="button">Cadastrar</button>
          </form>
  <?php
  }elseif (isset($_SESSION['adm'])){ 
           $usuario = $_SESSION['nome'];
?>     
		  <p>Bem Vindo<br>
		  <?php echo $usuario; ?><p>
		  <form action="DustyBookDescricaoUsuario.php" method="POST">
		 <p>Meus Dados<br>
		  <button class="button">Detalhes</button>
          </form>
		 <form action="DustyBookCadastroLivro.html" method="POST">
		 <p>Cadastrar livro para venda<br>
		  <button class="button">Cadastrar</button>
          </form>
		  <form action="DustyBookMeusLivros.php" method="POST">
		 <p>Meus Livros<br>
		  <button class="button">Detalhes</button>
          </form>
          <form action="DustyBookListaUsuario.php" method="POST">
		  <p>Usuarios<br>
		  <button class="button">Listar</button>
          </form>
		  <form action="DustyBookCadastroUsuarioForm.php" method="POST">
		  <p>Cadastrar Usuarios<br>
		  <button class="button">Cadastrar</button>
          </form>
          <form action="DustyBookSugestoesLista.php" method="POST">
		  <p>Sugestoes<br>
		  <button class="button">Listar</button>
          </form>		  
		  <form action="DustyBookLogout.php" method="POST">
		  <button class="button">Sair</button>
          </form>		  
		  
		  
		  
<?php
  }else { $usuario = $_SESSION['nome'];
?>
		  <p>Bem Vindo<br>
		  <?php echo $usuario; ?><p>
		  <form action="DustyBookDescricaoUsuario.php" method="POST">
		 <p>Meus Dados<br>
		  <button class="button">Detalhes</button>
          </form>
		 <form action="DustyBookCadastroLivro.html" method="POST">
		 <p>Cadastrar livro para venda<br>
		  <button class="button">Cadastrar livro</button>
          </form>
		  <form action="DustyBookMeusLivros.php" method="POST">
		 <p>Meus Livros<br>
		  <button class="button">Detalhes</button>
          </form>
		  <br><br>
		  <form action="DustyBookLogout.php" method="POST">
		  <button class="button">Sair</button>
          </form>
		  

		  
		  
		  
<?php }?>



		  </div>
  <div class="grid-item item6">
  <a href="https://www.facebook.com/" target="_blank"><img width="100px" height="100px" src="FB-PNG.png"></a>
  <a href="https://www.instagram.com/" target="_blank"><img width="100px" height="100px" src="instagram-relatorios-logo.png"></a>
  <a href="https://plus.google.com/discover" target="_blank"><img width="100px" height="100px" src="google+.png"></a>
  <a href="https://www.snapchat.com/" target="_blank"><img width="100px" height="100px" src="snapchat.png"></a>
  <a href="https://www.youtube.com/" target="_blank"><img width="100px" height="100px" src="youtube.png"></a>
  </div>
  <div class="grid-item item7">
  <p><a href="DustyBookSugestoes.html"><p><img width="300px" height="250px" src="sugestao.jpg"></a>
  </div>

</div>
</body>
</html>
