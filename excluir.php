<?php
header("Content-Type: text/html; charset=utf-8");
?>
<html>
<head>
	<title>Exclusão de Produtos</title>
</head>
<body>
<h2 align="center">Exclusão de Produtos</h2>
<hr>
<?php
require_once("conecta.php");

if (!isset($_POST["codigo"]) && !isset($_POST["enviar"])) {
	// Formulário para digitar o código
	?>
	<form method="POST" action="excluir.php">
		<p>Código do Produto: <input type="text" name="codigo" size="20"></p>
		<input type="submit" value="Buscar Produto">
	</form>
	<?php
} elseif (isset($_POST["codigo"]) && !isset($_POST["enviar"])) {
	// Busca dados do produto
	$codigo = intval($_POST["codigo"]);
	$sql1 = "SELECT * FROM tbl_produto WHERE pro_codigo=$codigo";
	$res = mysqli_query($conexao, $sql1);
	if (mysqli_num_rows($res) == 0) {
		echo "<p align='center'>Produto não encontrado</p>";
	} else {
		$registro = mysqli_fetch_row($res);
		$nome = $registro[1];
		$descricao = $registro[2];
		$preco = $registro[3];
		$categoria = $registro[4];
		?>
		<form method="POST" action="excluir.php">
			Nome: <?php echo htmlspecialchars($nome); ?><br>
			<p>Código: <b><?php echo htmlspecialchars($codigo); ?></b></p>
			Preço: <?php echo htmlspecialchars($preco); ?><br>
			Descrição: <?php echo htmlspecialchars($descricao); ?><br>
			Categoria:
			<select size="1" name="categoria" disabled>
				<?php
				$res1 = mysqli_query($conexao, "SELECT * FROM tbl_categoria");
				while ($registroCat = mysqli_fetch_row($res1)) {
					$nomecat = $registroCat[1];
					$cod = $registroCat[0];
					echo "<option value=\"$cod\"";
					if ($cod == $categoria) echo " selected";
					echo ">$nomecat</option>\n";
				}
				?>
			</select><br>
			<input type="hidden" name="codigo" value="<?php echo htmlspecialchars($codigo); ?>">
			<input type="hidden" name="enviar" value="S">
			<p>Tem certeza que deseja excluir este produto?</p>
			<input type="submit" value="Confirmar exclusão">
		</form>
		<?php
	}
	mysqli_close($conexao);
} elseif (isset($_POST["enviar"]) && isset($_POST["codigo"])) {
	// Excluir produto
	$codigo = intval($_POST["codigo"]);
	$sql = "DELETE FROM tbl_produto WHERE pro_codigo=$codigo";
	$res2 = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) == 1) {
		echo "<p align='center'>Produto excluído com sucesso!</p>";
	} else {
		$erro = mysqli_error($conexao);
		echo "<p align='center'>Erro: $erro</p>";
	}
	mysqli_close($conexao);
}
?>
<p align="center"><a href="javascript:history.back();">Voltar</a></p>
</body>
</html>
