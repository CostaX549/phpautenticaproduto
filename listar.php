<?php
header("Content-Type: text/html; charset=utf-8", true);
?>
<html>
<head> <title>Lista de Produtos</title></head>
<body>
<h2 align="center">Lista de Produtos</h2><hr>
<div align="center">
<center>
<table border="1" cellpadding="0" cellspacing="0" width="90%">
<tr>
<td width="25%" bgcolor="#EEEEEE" align="center">
<p align="center"><b>
<a href="listar.php?ordem=pro_codigo">Código</a></b></td>
<td width="25%" bgcolor="#EEEEEE" align="center"><b>
<a href="listar.php?ordem=pro_nome">Nome</a></b></td>
<td width="30%" bgcolor="#EEEEEE" align="center"><b>
<a href="listar.php?ordem=pro_descricao">Descrição</a></b></td>
<td width="10%" bgcolor="#EEEEEE" align="center"><b>
<a href="listar.php?ordem=pro_preco">Preço</a></b></td>
<td width="10%" bgcolor="#EEEEEE" align="center"><b>
<a href="listar.php?ordem=cat_codigo">Categoria</a></b></td>
</tr>
<?php
require_once "conecta.php";
if (isset($_GET["ordem"])) {
	$ordem = $_GET["ordem"];
} else {
	$ordem = "pro_codigo";
}
$sql1 = "SELECT * FROM tbl_produto ORDER BY $ordem";
$res = mysqli_query($conexao, $sql1);
while ($registro = mysqli_fetch_row($res)) {
	$codigo = $registro[0];
	$nome = $registro[1];
	$descricao = $registro[2];
	$preco = number_format($registro[3], 2, ",", ".");
	$categoria = $registro[4];
	echo "<tr>";
	echo "<td width='25%'>";
	echo "<p align='center'>$codigo</td>";
	echo "<td width='25%'>$nome</td>";
	echo "<td width='30%'>$descricao</td>";
	echo "<td width='10%' align='center'>R\$ $preco</td>";
	echo "<td width='10%' align='center'>$categoria</td>";
	echo "</tr>";
}
mysqli_close($conexao);
?>
</table>
</center>
</div>
<p align="center"><a href="javascript:history.back();">Voltar</a></p>
</body>
