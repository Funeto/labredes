<?php
include("config.php");
if(isset($_POST['nome'])){
	extract($_POST);
	if($consulta = $conexao->query("insert into tb_contas (con_nome, con_usuario, con_telefone, con_datanasc, con_email, con_gen_codigo, con_senha) values ('$nome', '$usuario', '$telefone', '$data', '$email', '$genero','".md5($senha)."')")){
		header("Location: confirmacao.php");}
	else {
		$erro=1;
	}
}
$consulta2 = $conexao->query("select * from tb_generos");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro</title>
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
				transform: translate(-50%);
				background: #7EFFEF;
				border-radius: 15px;
				box-shadow: 4px 4px 4px rgba(0,0,0,0.35);
				margin: 8px 0;
			}
			.a h1{
				text-align: center;
				color: #777777;
				font-size: 2rem;
				margin: 14px 0;
			}
			.cadastro{
				text-align: center;
				position: relative;
				width: 90%;
				left: 50% ;
				transform: translate(-50%);
			}
			.cadastro label{
				display: block;

			}
			.cadastro label span{
				margin: 7px 0;
				display: inline-block;
				float: left;
				margin-left: 15px;
				font-weight: bold;
				color: #777777;
			}
			.cadastro input,.cadastro select{
				padding: 0 15px;
				display: block;
				background:  #ffffff;
				width: 100%;
				height: 30px;
				outline: none;
				color: #444444;
				font-size: 1rem;
				border: 2px solid #FF9999;
				border-radius: 15px;
			}
			.selecionar{
				cursor: pointer;
			}
			.cadastro input[type="submit"]{
				cursor: pointer; 
				left: 50% ;
				transform: translate(-50%);
				position: relative;
				width: 170px;
				margin-top: 20px;
				border-radius: 15px;
				transition: all .1s ease-in-out;
				height: 40px;
			}
			.cadastro input[type="submit"]:hover {
				background: #FF9999;
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
				<h1>Faça seu cadastro:</h1>
				<form class="cadastro" action="?" method="POST">
					<label for="nome">
						<span>Nome completo:</span>
						<input type="text" id="nome" name="nome" autofocus="1">
					</label>
					<label for="usuario">
						<span>Usuário:</span>
						<input type="text" id="usuario" name="usuario">
					</label>
					<label for="senha">
						<span>Senha:</span>
						<input type="password" id="senha" name="senha">
					</label>
					<label for="telefone">
						<span>Telefone:</span>
						<input type="telefone" id="telefone" name="telefone">
					</label>
					<label for="email">
						<span>E-mail:</span>
						<input type="email" id="email" name="email">
					</label>
					<label for="data">
						<span>Data de nascimento:</span>
						<input type="date" id="data" name="data">
					</label>
					<label for="genero">
						<span>Gênero:</span>
						<select name="genero" id="genero" class="selecionar">
							<?php while($resultado2 = $consulta2->fetch_assoc()){ ?>
								<option value="<?php echo $resultado2['gen_codigo']; ?>"><?php echo $resultado2['gen_genero']; ?></option>
							<?php } ?>
						</select>
					</label>
					<?php if(@$erro == 1) echo '<p style="color: red;"><br>Erro! Alguma informação está errada.</p>'?>
					<input type= "submit" value="cadastrar">
				</form> 
			</div>
		</main>
	</body>
</html>
