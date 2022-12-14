<!DOCTYPE html>
<html>
	<head> 
		<title> Início </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width-device-width, initial-scale">
		<script src="https://kit.fontawesome.com/07069c0e3b.js" crossorigin="anonymous"></script>
		<style type="text/css" class = "header">
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
			nav {
				background: #7EFFEF;
				height: 80px;
				width: 100%;
				box-shadow: 0px 4px 4px rgba(0,0,0,0.35);
			}
			.logo {
				color: #777777;
				font-size: 35px;
				line-height: 80px;
				padding: 0 100px;
				font-weight: bold;
				transition: 0.2s;
			}
			.logo:hover {
				opacity: 0.7;
			}
			.navlista {
				float: right;
			}
			.navlista li {
				display: inline-block;
				line-height: 80px;
				margin: 0 5px;
			}
			.navlista li a {
				color: #FF8997;
				display: inline-block;
				margin: 0 10px;
				margin-top: 10px;
				line-height: 70px;
				padding: 0 43px;
				font-size: 25px;
				border-radius: 15px 15px 0 0;
				transition: 0.2s;
			}
			.navlista li a.atual, .navlista li a:hover {
				color: #7EFFEF;
				background: #FF8997;
				padding: 0 43px;
				margin: 0 10px;
				margin-top: 10px;
				border-radius: 15px 15px 0 0;
			}
			.checkbtn {
				font-size: 30px;
				color: #777777;
				float: right;
				line-height: 80px;
				margin-right: 40px;
				cursor: pointer;
				display: none;
			}
			#check {
				display: none;
			}
			@media (max-width: 970px){
				.checkbtn {
					display: block;
				}
				.navlista{
					width: 100%;
					background: #7EFFEF;
					display: none;
					left: -100%;
					text-align: center;
					transition: all 0.5s;
					box-shadow: 0px 4px 4px rgba(0,0,0,0.35);
				}
				.navlista li{
					display: block;
					width: 100%
					line-height: 30px;
				}
				.navlista li a {
					border-radius: 15px;
					font-size: 20px;
					padding: 0;
					margin: 0px;
					width: 100%;
				}
				.navlista li a.atual, .navlista li a:hover {
					border-radius: 15px;
					color: #7EFFEF;
					background: #FF8997;
					padding: 0;
					margin: 0px;
					width: 100%;
				}
				#check:checked ~ ul {
					display: block;
					left: 0;
				}
			}
			</style>
		<style type="text/css" class = "main">
			.divlogo {
				background-color: #FF8997;
				position: relative;
				display: inline-block;
				left: 50%;
				transform: translate(-50%);
				margin: 35px 0;
				width: 66%;
				padding: 10px 0;
				border-radius: 15px;
				box-shadow: 4px 4px 4px rgba(0,0,0,0.35);
				text-align: center;
			}
			.divlogo a img{
				position: relative;
				height: 150px;
			}
			.sessao {
				position: relative;
				text-align: center;
			}
			.titulo {
				color: #FF8997;
				display: inline-block;
				margin: 10px 0;
				position: relative;
				padding: 20px;
				border-radius: 15px;
				background: white;
				box-shadow: 4px 4px 4px rgba(0,0,0,0.35);
				font-size: 28px;

			}
			.centro {
				display: grid;
				grid-template-columns: auto auto auto;
				position: relative;
				left: 50%;
				transform: translate(-50%);
				width: 70%;
				margin-top: 35px;
			}
			
			.divprodutos {
				position: relative;
				left: 50%;
				transform: translate(-50%);
				padding-top: 20px;
				padding-bottom: 20px;
				border-radius: 15px;
				text-align: center;
			}
			.divimg img {
				position: relative;
				display: inline-block;
				border-radius: 15px;
				box-shadow: 4px 4px 4px rgba(0,0,0,0.35);
				height: 250px;
				border: 5px solid #7EFFEF;
				transition: 0.2s;
			}
			.divimg img:hover {
				border-color: #FF8997;
			}
			.divprodutos h2 {
				display: inline-block;
				position: relative;
				background: white;
				padding: 10px;
				border-radius: 15px;
				margin: 20px 10px 0px 10px;
				box-shadow: 4px 4px 4px rgba(0,0,0,0.35);
			}
			.bloco {
				display: inline-grid;
			}
			@media (max-width: 1120px){
				.centro {
				grid-template-columns: auto auto;
				}
			}
			@media (max-width: 750px){
				.divimg img {
				height: 150px;
				}
			}
			</style>
		<style type="text/css" class = "footer">
			footer {
                background: #FF8997;
                color: white;
                position: relative;
            }
			.rodape {
				position: relative;
				display: inline-block;
				left: 50%;
				transform: translate(-50%);
				margin-top: 40px;
				margin-bottom: 150px;
				
			}
			.rodape p{
				text-align: center;
				line-height: 25px;
			}
			@media (min-height: 94rem) {
				footer {
					position: absolute;
					bottom: 0px;
					width: 100%;
				}
			}
		</style>
	</head>
	<body>
		<header>
			<nav>
				<input type="checkbox" id="check">
				<label for="check" class="checkbtn"><i class="fas fa-bars"></i></label>
				<a class = "logo" href="index.php"> Gelato Web </a>
				<ul class = "navlista">
					<li><a class="atual" href="index.php">Início</a></li><!--
					--><li><a href="produtos.php">Produtos</a></li><!--
					--><li><a href="login.php">Login</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<div class = "divlogo">
				<a href="index.php"><img src="img/logo.png"></a>
			</div>
			<div class="sessao"><h1 class="titulo"><i class="fas fa-ice-cream"></i> Nossos Produtos <i class="fas fa-ice-cream"></i></h1></div>
			<div class="centro">
				<div class = "bloco">
					<div class="divprodutos">
						<div class="divimg"><img src="img/milkshake.png"></div>
						<h2 style="color: #FF8997;"> Milkshakes </h2>
					</div>
				</div><!--
				--><div class = "bloco">
					<div class="divprodutos">
						<div class="divimg"><img src="img/acai.png"></div>	
						<h2 style="color: violet;"> Açaí </h2>
					</div>
				</div><!--
				--><div class = "bloco">
					<div class="divprodutos">
						<div class="divimg"><img src="img/sorvete.png"></div>	
						<h2 style="color: lawngreen;"> Sorvetes </h2>
					</div>
				</div><!--
				--><div class = "bloco">
					<div class="divprodutos">
						<div class="divimg"><img src="img/picole.png"></div>
						<h2 style="color: turquoise;"> Picolés </h2>
					</div>
				</div><!--
				--><div class = "bloco">
					<div class="divprodutos">
						<div class="divimg"><img src="img/chocolate.png"></div>	
						<h2 style="color: peru;"> Chocolate Quente </h2>
					</div>
				</div><!--
				--><div class = "bloco">
					<div class="divprodutos">
						<div class="divimg"><img src="img/banana.png"></div>	
						<h2 style="color: gold;"> Banana Split </h2>
					</div>
				</div>
			</div>
			<div style="height: 30px; position: relative;"></div>
		</main>
		<footer>
			<div class="rodape">
				<p>Fale conosco<br>Whatsapp: (84)40028922<br>E-mail: gelatoweb@gmail.com<br>Instagram: @gelatoweb</p>
			</div>
		</footer>
	</body>
</html>