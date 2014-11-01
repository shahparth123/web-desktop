<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<form name="form1" method="post" action="">
<p>Login:
<input name="login" type="text" id="login">
</p>
<p>Nombre Completo:
<input name="nombre" type="text" id="nombre">
</p>
<p>Password:
<input name="pwd" type="password" id="pwd">
</p>
<p>
<input type="submit" name="Submit" value="Crear">
</p>
</form>
</body>
</html>

<?php
if (isset($_POST['login'])) {
$login=$_POST['login'];
$nombre=$_POST['nombre'];
$passwd_crypt=crypt($_POST['pwd']);

$res=`bash /var/www/cgi-bin/a $login "$nombre" '$passwd_crypt'`;
echo "<br><br>Usuario creado";
}
?>