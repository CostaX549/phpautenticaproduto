<?php
header("Content-Type: text/html; charset=utf-8", true);?>
<html>
<head> <title>Inclusão Registros</title></head>
<body>
<h2 align="center">Inclusão de Produtos</h2><hr>
<?php
require_once("conecta.php");
if(!isset($_POST["enviar"]))
{
?>
<form method="POST" action="incluir.php">
Nome:<input type="text" name="nome" size="30"><br>
Descrição:<br><textarea rows="2" name="descricao" cols="30"></textarea><br>
Preço:<input type="text" name="preco" size="10"><br>
Categoria:<select size="1" name="categor">
<?php
// Gera a lista de categorias
$res=mysqli_query($conexao, "SELECT cat_codigo, cat_nome FROM tbl_categoria");
while($registro=mysqli_fetch_row($res))
{
    $cod=$registro[0];
    $nome=$registro[1];
    echo "<option value=\"$cod\">$nome</option>\n";
}
?>
</select><br>
<input type="hidden" name="enviar" value="S">
<input type="submit" value="Incluir Produto" name="incluir"></p>
</form>
<?php
}
else // Inclui produto

    if ($conexao)
    {
        // $codigo=$_POST["codigo"];
        $nome=$_POST["nome"];
        $descricao=$_POST["descricao"];
        $preco=$_POST["preco"];
        $categor=$_POST["categor"];
        $sql="INSERT INTO tbl_produto (pro_nome, pro_descricao, pro_preco, cat_codigo) VALUES ('$nome', '$descricao', '$preco', '$categor')";
        $res2=mysqli_query($conexao, $sql);
        if ($res2)
        {
            echo"<p align='center'>Produto incluído com sucesso!</p>";
        }
        else
        {
            $erro=mysqli_error($conexao);
            echo "<p align='center'>Erro: $erro</p>";
        }
        mysqli_close($conexao);
    }
?>
<p align="center"><a href="menu.php">Voltar</a></p>
</body>
</html>