<?php 
// Inicializa a sessão 
session_start(); 

// Se não tiver variáveis registradas, retorna para a tela de login 
if (!isset($_SESSION["id"]) || !isset($_SESSION["nome"])) {
    header("Location: index.php");
    exit(); // Garante que o script será interrompido após o redirecionamento
}
?>