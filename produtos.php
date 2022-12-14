<?php
	include("config.php");
	$consulta = $conexao->query("select distinct pro_nome, pro_preco, sab_sabor from tb_produtos join tb_sabdospro on sdp_pro_codigo = pro_codigo join tb_sabores on sdp_sab_codigo = sab_codigo order by pro_nome");
?>
<!DOCTYPE html>
<html>
    <head> 
        <title> Produtos </title>
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
            .divprodutos {
                display: inline-block;
                position: relative;
                width: 84%;
                background: #7EFFEF;
                left: 50%;
                transform: translate(-50%);
                margin: 20px 0;
                padding: 10px;
                border-radius: 15px;
                box-shadow: 4px 4px 4px rgba(0,0,0,0.35);
                color: #777777;
            }
            .tabela {
                position: relative;
                width: 100%;
                background: white;
                border-radius: 15px;
                padding: 15px;
            }
            .colunas {
                font-size: 26px;
                line-height: 40px;
                
            }
            .colunas th {
                width: 33.3333%;
                padding-bottom: 15px;
            }
            .produto {
            	font-size: 18px;
            	line-height: 30px;
            }
            .preco {
            	float: right;
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
            @media (min-height: 130rem) {
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
                    <li><a href="index.php">In??cio</a></li><!--
                    --><li><a class="atual" href="produtos.php">Produtos</a></li><!--
                    --><li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="divprodutos">
                <table class="tabela">
                    <tr class="colunas">
                        <th>Produto</th><th>Sabor</th><th>Pre??o</th>
                    </tr>
                    <?php while($resultado = $consulta->fetch_assoc()){ ?>
						<tr class="produto">
							<td><?php echo $resultado['pro_nome']; ?></td>
							<td><?php echo $resultado['sab_sabor']; ?></td>
							<td class="preco"> R$ <?php echo $resultado['pro_preco']; ?></td>
						</tr>
					<?php } ?>
                </table>
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