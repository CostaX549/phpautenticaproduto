<?php 
header("Content-Type: text/html; charset=utf8",true); 
//VERIFICA SE A SESSÃO ESTÁ ATIVA 
require_once("verifica.php"); 
echo "<h2>Autenticação de Usuários</h2>"; 
echo "Usuário logado no sistema: ".$_SESSION["nome"];?> 
<h2 align="center">Menu de administração da Loja Tabajara</h2><hr> 
<p align="center"><a href="incluir.php"><b>Incluir Produto</b></a></p> 
<p align="center"><a href="consultar.php"><b>Consultar Produto</b></a></p> 
<p align="center"><a href="alterar.php"><b>Alterar Produto</b></a></p> 
<p align="center"><a href="excluir.php"><b>Excluir Produto</b></a></p> 
<p align="center"><a href="listar.php"><b>Listar Produtos</b></a></p> 
<?php 
echo "<br><br><a href='logout.php'>Logout</a>"; 
?>