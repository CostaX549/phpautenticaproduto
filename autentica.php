<?php 
//Conecta com banco de dados 
require_once("conecta.php"); 
//Recebe dados do formulário 
$usuario = $_POST["txtUsuario"]; 
$senha= $_POST["txtSenha"];
// Busca no banco de dados, usuário e senha digitados 
$sql = mysqli_query($conexao, " 
SELECT A.usu_id, A.usu_nome FROM tbl_usuario A WHERE 
A.usu_usuario = '$usuario' AND A.usu_senha = '$senha'") or die("ERRO NO COMANDO SQL"); 
//Linhas afetada pela consulta 
$row = mysqli_num_rows($sql); 
// Verifica se retornou algo 
if($row == 0) 
{ 
echo "Usuário/Senha inválidos"; 
} 
else{
while($dados=mysqli_fetch_assoc($sql)) 
{ 
session_start(); 
$_SESSION["id"] = $dados['usu_id']; 
$_SESSION["nome"] = $dados['usu_nome'];
header("Location: menu.php"); 
} 
} 
?>