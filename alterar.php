<?php
header("Content-Type: text/html; charset=utf-8", true);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alteração de Produtos</title>
</head>
<body>
<h2 align="center">Alteração de Produtos</h2>
<hr>
<?php
require_once "conecta.php";

if (!isset($_POST["codigo"]) && !isset($_POST["enviar"])) {
?>
	<form method="POST" action="alterar.php">
		<p>Código do Produto: <input type="text" name="codigo" size="20">
		<input type="submit" value="Alterar produto" name="alterar"></p>
	</form>
<?php
} elseif (isset($_POST["codigo"]) && !isset($_POST["enviar"])) {
	// Busca dados do produto
	$codigo = intval($_POST["codigo"]);
	$sql1 = "SELECT * FROM tbl_produto WHERE pro_codigo=$codigo";
	$res = mysqli_query($conexao, $sql1);
	if (mysqli_num_rows($res) == 0) {
		echo "Produto não encontrado";
	} else {
		$registro = mysqli_fetch_row($res);
		$nome = $registro[1];
		$descricao = $registro[2];
		$preco = $registro[3];
		$categoria = $registro[4];
?>
	<form method="POST" action="alterar.php">
		<p>Código: <b><?php echo $codigo; ?></b><br><br>
		Nome: <input type="text" name="nome" size="40" value="<?php echo htmlspecialchars($nome); ?>"><br>
		Descricao:<br>
		<textarea rows="2" name="descricao" cols="30"><?php echo htmlspecialchars($descricao); ?></textarea><br>
		Preço: <input type="text" name="preco" size="10" value="<?php echo htmlspecialchars($preco); ?>"><br>
		Categoria:
		<select size="1" name="categor">
		<?php
		// Gera a lista de categorias
		$res1 = mysqli_query($conexao, "SELECT * FROM tbl_categoria");
		while ($registroCat = mysqli_fetch_row($res1)) {
			$cod = $registroCat[0];
			$nomecat = $registroCat[1];
			echo "<option value=\"$cod\"";
			if ($cod == $categoria) echo " selected";
			echo ">$nomecat</option>\n";
		}
		?>
		</select><br>
		<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
		<input type="submit" value="Alterar produto" name="Alterar">
		<input type="hidden" name="enviar" value="S">
		</p>
	</form>
<?php
	}
	mysqli_close($conexao);
} elseif (isset($_POST["enviar"])) {
	// Alterar produto
	$codigo = intval($_POST["codigo"]);
	$nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
	$descricao = mysqli_real_escape_string($conexao, $_POST["descricao"]);
	$cat = intval($_POST["categor"]);
	$preco = floatval($_POST["preco"]);
	$sql = "UPDATE tbl_produto SET pro_nome='$nome', pro_descricao='$descricao', pro_preco=$preco, cat_codigo=$cat WHERE pro_codigo=$codigo";
	$res2 = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) == 1) {
		echo "<p align=\"center\">Produto alterado com sucesso!</p>";
	} else {
		$erro = mysqli_error($conexao);
		echo "<p align=\"center\">Erro: $erro</p>";
	}
	mysqli_close($conexao);
}
?>
<p align="center"><a href="javascript:history.back();">Voltar</a></p>
</body>
</html>
