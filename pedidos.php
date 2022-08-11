<?php
include("config.php");
include("verifica.php");
if(isset($_POST['descricao'])){
	extract($_POST);
	if($consulta = $conexao->query("insert into tb_pedidos (ped_con_codigo, ped_cid_codigo, ped_for_codigo, ped_descricao, ped_numero, ped_logradouro, ped_pontoref, ped_bairro) values ('".$_SESSION['codigo']."', '$cidade', '$formapgmt', '$descricao', '$numero', '$logradouro', '$pontoref', '$bairro')")){
		header("Location: confirmacao2.php");}
	else {
		$erro=1;
	}
}
$consulta2 = $conexao->query("select * from tb_formaspgmt");
$consulta3 = $conexao->query("select * from tb_cidades");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pedidos</title>
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
			@media (max-width: 990px){
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
		<style type="text/css" class="main">
			.a {
				display: inline-block;
                position: relative;				
                width: 50%;
				padding: 15px;
				left: 50%;
				transform: translate(-50%);
				background: #7EFFEF;
				text-align: center;
				border-radius: 15px;
				box-shadow: 4px 4px 4px rgba(0,0,0,0.35);
				margin: 30px 0;
			}
			.a h1{
				text-align: center;
				color: #777777;
				font-size: 2rem;
				margin: 14px 0;
			}
			.pedidos{
				text-align: center;
				position: relative;
				width: 90%;
				left: 50% ;
				transform: translate(-50%);
			}
			.pedidos label{
				display: block;
			}
			.pedidos label span{
				margin: 7px 0;
				display: inline-block;
				float: left;
				margin-left: 15px;
				font-weight: bold;
				color: #777777;
			}
			.pedidos input,.pedidos select{
				padding: 0 15px;
				display: block;
				background:  #ffffff;
				width: 100%;
				height: 30px;
				margin-top: none;
				outline:none ;
				color: #444444;
				font-size: 1rem;
				border: 2px solid #FF9999;
				border-radius: 15px;
			}
			.selecionar{
				cursor: pointer;
			}
			.pedidos input[type="submit"]{
				cursor: pointer; 
				left: 50% ;
				transform: translate(-50%);
				position: relative;
				width: 200px;
				margin-top: 25px;
				border-radius: 15px;
				transition: all .2s ease-in-out;
				height: 50px;
			}
			.pedidos input[type="submit"]:hover {
				background: #FF9999;
			}
			@media (max-width: 970px){
                .a {
                	width: 80%;
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
			@media (min-height: 64rem) {
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
                <li><a href="index.php">Início</a></li><!--
                --><li><a href="produtos.php">Produtos</a></li><!--
                --><li><a href="sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
            </ul>
        </nav>
    </header>
	<main>
		<div class="a">
			<h1>Faça seu pedido:</h1>
			<form class="pedidos" action="?" method="POST">
				<label for="descricao">
					<span>Informe qual(is) produto(s) você deseja adquirir:</span>
					<input type="text" id="descricao" name="descricao" autofocus="1">
				</label>
				<label for="cidade">
					<span>Informe em qual cidade você mora:</span>
					<select name="cidade" id="cidade" class="selecionar">
						<?php while($resultado3 = $consulta3->fetch_assoc()){ ?>
							<option value="<?php echo $resultado3['cid_codigo']; ?>"><?php echo $resultado3['cid_cidade']; ?></option>
						<?php } ?>
					</select>
				</label>
				<label for="bairro">
					<span>Informe em qual bairro devemos realizar a entrega:</span>
					<input type="text" id="bairro" name="bairro">
				</label>
				<label for="logradouro">
					<span>Informe em qual logradouro devemos realizar a entrega:</span>
					<input type="text" id="logradouro" name="logradouro">
				</label>
					<label for="numero">
					<span>Informe o número da casa:</span>
					<input type="text" id="numero" name="numero">
				</label>
					<label for="pontoref">
					<span>Informe um ponto de referência:</span>
					<input type="text" id="pontoref" name="pontoref">
				</label>
				<label for="formapgmt">
					<span>Forma de pagamento:</span>
					<select name="formapgmt" id="formapgmt" class="selecionar">
						<?php while($resultado2 = $consulta2->fetch_assoc()){ ?>
							<option value="<?php echo $resultado2['for_codigo']; ?>"><?php echo $resultado2['for_formapgmt']; ?></option>
						<?php } ?>
					</select>
				</label>
				<?php if(@$erro == 1) echo '<p style="color: red;"><br>Erro! Alguma informação está errada.</p>'?>
				<input type= "submit" value="Finalize seu pedido!">
			</form> 
		</div>
	</main>
	<footer>
		<div class="rodape">
			<p>Fale conosco<br>Whatsapp: (84)40028922<br>E-mail: gelatoweb@gmail.com<br>Instagram: @gelatoweb</p>
		</div>
	</footer>
</body>
</html>
