<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro concluído</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width-device-width, initial-scale">
		<script src="https://kit.fontawesome.com/07069c0e3b.js" crossorigin="anonymous"></script>
		<style type="text/css" class="main">
			body {
				font-family: "Trebuchet MS";
				background-image: url(img/fragmento.png);
			}
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
				list-style: none;
				text-decoration: none;
			}
			::selection {
                background: #F36A79;
                color: white;
            }
			.a {
				width: 50%;
				padding: 15px;
				position: absolute;
				left: 50%;
				top: 30%;
				transform: translate(-50%, -50%);
				background: white;
				border-radius: 15px;
				box-shadow: 4px 4px 4px rgba(0,0,0,0.35);
			}
			.a h1{
				text-align: center;
				font-size: 2rem;
				margin: 14px 0;
			}
			@media (max-width: 970px){
                .a {
                	width: 80%;
                }
            }
		</style>
	</head>
	<body>
		<main>
			<div class="a">
				<h1 style="color: #FF9999;"><i class="fas fa-check"></i> Seu pedido foi enviado! Aguarde a chegada dele ao endereço informado.<br><a href="pedidos.php" style="color: #7EFFEF;"> < Voltar a aba de pedidos</a> </h1>
			</div>
		</main>
	</body>
</html>