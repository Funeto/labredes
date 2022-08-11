<?php
include("config.php");
$erro=0;
if(isset($_POST['usuario'])){
	extract($_POST);
	$consulta = $conexao->query("select * from tb_contas where con_usuario = '$usuario' and con_senha = '".md5($senha)."'");
	if($resultado = $consulta->fetch_assoc()){
		$_SESSION['codigo'] = $resultado['con_codigo'];
		$_SESSION['usuario'] = $resultado['con_usuario'];
		$_SESSION['senha'] = $resultado['con_senha'];
		header("Location: pedidos.php");
	}
	else {
		$erro=1;
	}
}
?>

<!DOCTYPE html>
<html>
	<head> 
		<title> Login </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width-device-width, initial-scale">
		<script src="https://kit.fontawesome.com/07069c0e3b.js" crossorigin="anonymous"></script>
		<style>
			body {
				font-family: "Trebuchet MS";
				background-image: url(img/fragmento.png);
			}
			::selection {
                background: #F36A79;
                color: white;
            }
			.caixa {
				width: 270px;
				padding: 40px;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				background: #7EFFEF;
				text-align: center;
				border-radius: 15px;
				box-shadow: 4px 4px 4px rgba(0,0,0,0.35);
			}
			.caixa h1 {
				color: #444444;
			}
			.caixa input[type = "text"], .caixa input[type = "password"] {
				background: none;
				display: block;
				font-size: 15px;
				margin: 20px auto;
				text-align: center;
				background: #FF9999;;
				border: 2px solid #FF9999;
				padding: 14px;
				width: 200px;
				outline: none;
				color: #444444;
				border-radius: 15px;
				transition: 0.2s;
			}
			.caixa input[type = "text"]:focus, .caixa input[type = "password"]:focus {
				width: 230px;
				background: white;
			}
			.caixa input[type = "submit"] {		
				background: none;
				display: block;
				font-size: 15px;
				margin: 20px auto;
				text-align: center;
				background: none;
				border: 2px solid #FF9999;
				padding: 14px 40px;
				outline: none;
				color: #444444;
				border-radius: 15px;
				transition: 0.2s;
				cursor: pointer;
			}
			.caixa input[type = "submit"]:hover {
				background: #FF9999;
			}
			a {
				text-decoration: none;
				color: blue;
			}
			p {
				font-size: 14;
				opacity: 0.9;
			}
		</style>
	</head>
	<body>
		<main>
			<form action="?" method="POST" class = "caixa">
				<h1> Login </h1>
				<input type="text" name="usuario" placeholder="Usuário" autofocus="1" autocomplete="off">
				<input type="password" name="senha" placeholder="Senha" autofocus="off">
				<input type="submit" name="entrar" value="Entrar">
				<?php if(@$erro == 1) echo '
				<p style="color: red;">Erro! Usuário ou senha inválida.<br></p>'; ?>
				<p><br> Não possui uma conta? <a href="cadastro.php">Cadastre-se</a></p>
			</form>
		</main>
	</body>
</html>