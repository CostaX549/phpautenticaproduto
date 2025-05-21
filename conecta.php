<?php 
// Dados para conexão 
$servidor = "localhost"; 
// Servidor 
$bd = "bd_loja";
// Banco de dados 
$usuario = "root";
$senha =  "";

// Usuário 
// Senha 
// Conectando com MySQL 
$conexao = mysqli_connect($servidor, $usuario, $senha)
or die("ERRO NA CONEXÃO"); 
// Seleciona o banco de dados para ser utilizado 
$db = mysqli_select_db($conexao,$bd) 
or die("ERRO NA SELEÇÃO DO DATABASE"); 
?>