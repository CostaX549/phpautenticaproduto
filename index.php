<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <title>Autenticação de Usuários</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
</head> 
<body> 
    <h2>Autenticação de Usuários</h2> 
    <form name="frmAutentica" method="post" action="autentica.php"> 
        <table border="0" cellpadding="0" cellspacing="0" width="50%"> 
            <tr> 
                <td width="10%">Usuário:</td> 
                <td width="40%"><input type="text" name="txtUsuario" size="25"></td> 
            </tr> 
            <tr> 
                <td width="10%">Senha:</td> 
                <td width="40%"><input type="password" name="txtSenha" size="10"></td> 
            </tr> 
            <tr> 
                <td colspan="2" align="center"> 
                    <input type="submit" name="btnLogar" value="Logar no sistema >>">
                </td> 
            </tr> 
        </table> 
    </form> 
</body> 
</html>