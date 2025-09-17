<?php
header("Content-Type: text/html; charset=utf-8", true);
?>
<html>
<head> <title>Consulta de Produtos</title></head>
<body>
<h2 align="center">Consulta de Produtos</h2><hr>
<?php
require_once("conecta.php");
if (!isset($_POST["codigo"])) {
?>
<form method="POST" action="consultar.php">
<p>Código do Produto:<input type="text" name="codigo" size="20">
<input type="submit" value="Digite o código a ser consultado" name="consultar"></p>
</form>
<?php
} elseif (!isset($_POST["enviar"])) { //busca dados do produto
	$codigo = $_POST["codigo"];
	$sql1 = "SELECT * FROM tbl_produto WHERE pro_codigo = $codigo";
	$res = mysqli_query($conexao, $sql1);
	if (mysqli_num_rows($res) == 0) {
		echo "Produto não encontrado";
	} else {
		echo "Produto encontrado";
		$registro = mysqli_fetch_row($res);
		$nome = $registro[1];
		$descricao = $registro[2];
		$preco = $registro[3];
		$categoria = $registro[4];
?>
<form method="POST" action="excluir.php">
<p>Código:<b><?php echo $codigo; ?> </b><br><br>
Nome: <?php echo $nome;?><br>
Descricao:<?php echo $descricao;?> <br>
Preço: <?php echo $preco;?><br>
Categoria:<select size="1" name="categoria">
<?php
		// Gera a lista de categorias
		$res1 = mysqli_query($conexao, "SELECT * FROM tbl_categoria WHERE cat_codigo = $categoria");
		while ($registro = mysqli_fetch_row($res1)) {
			$cod = $registro[0];
			$nomecat = $registro[1];
			echo "<option value=\"$cod\"";
			if ($cod == $categoria)
				echo " selected";
			echo ">$nomecat</option>\n";
		}
?>
</select><br>
<input type="hidden" name="codigo" value="<?php echo $codigo;?>">
<input type="hidden" name="enviar" value="S">
</form>
<?php
	}
	mysqli_close($conexao);
}
?>
<p align="center"><a href="javascript:history.back();">Voltar</a></p>
</body>                                                                                                                             
</html>