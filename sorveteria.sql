DROP DATABASE IF EXISTS db_sorveteria;
CREATE DATABASE db_sorveteria;
USE db_sorveteria;

create table tb_produtos (
	pro_codigo int not null auto_increment,
    pro_nome varchar(45) not null,
    pro_preco decimal(5,2) not null,
    primary key(pro_codigo)
) engine = InnoDB;

create table tb_sabores (
	sab_codigo int not null auto_increment,
    sab_sabor varchar(45) not null,
    primary key(sab_codigo)
) engine = InnoDB;

create table tb_sabdospro (
	sdp_pro_codigo int not null,
    sdp_sab_codigo int not null,
    foreign key (sdp_pro_codigo) references tb_produtos(pro_codigo),
    foreign key (sdp_sab_codigo) references tb_sabores(sab_codigo),
    primary key (sdp_pro_codigo,sdp_sab_codigo)
) engine = InnoDB;

create table tb_generos (
	gen_codigo int not null auto_increment,
    gen_genero varchar(45) not null,
    primary key(gen_codigo)
) engine = InnoDB;

create table tb_contas (
	con_codigo int not null auto_increment,
    con_gen_codigo int not null,
    con_nome varchar(100) not null,
    con_usuario varchar(30) not null,
    con_senha varchar(40) not null,
    con_telefone varchar(30) not null,
    con_datanasc date not null,
    con_email varchar(100) not null,
    primary key(con_codigo),
    foreign key(con_gen_codigo) references tb_generos(gen_codigo)
) engine = InnoDB;

create table tb_cidades (
	cid_codigo int not null auto_increment,
    cid_cidade varchar(100) not null,
    primary key(cid_codigo)
) engine = InnoDB;

create table tb_formaspgmt (
	for_codigo int not null auto_increment,
    for_formapgmt varchar(100) not null,
    primary key(for_codigo)
) engine = InnoDB;

create table tb_pedidos (
	ped_codigo int not null auto_increment,
    ped_con_codigo int not null,
    ped_cid_codigo int not null,
    ped_for_codigo int not null,
    ped_descricao varchar(300) not null,
    ped_numero varchar(6) not null,
    ped_logradouro varchar(100) not null,
    ped_pontoref varchar(100),
    ped_bairro varchar(60) not null,
    primary key(ped_codigo),
    foreign key(ped_con_codigo) references tb_contas(con_codigo),
    foreign key(ped_cid_codigo) references tb_cidades(cid_codigo),
    foreign key(ped_for_codigo) references tb_formaspgmt(for_codigo)
) engine = InnoDB;

insert into tb_produtos (pro_nome, pro_preco) values
	('Sorvete Casquinha 1 bola', 3),
    ('Sorvete Casquinha 2 bola', 6),
    ('Sorvete Casquinha 3 bola', 8),
    ('Picolé Gourmet', 10),
    ('Picolé', 3),
    ('Açai 1L', 20),
    ('Açai 500ml', 10),
    ('Banana Split', 10),
    ('Milkshake 500ml', 12),
    ('Milkshake 400ml', 9),
    ('Chocolate quente', 8);
    
insert into tb_sabores (sab_sabor) values
	('chocolate'), ('flocos'), ('baunilha'), ('morango'), ('napolitano'), ('coco'), ('limão'), ('tradicional'), ('banana'), ('chocolate ao leite'), ('chocolate amargo');

insert into tb_sabdospro (sdp_pro_codigo, sdp_sab_codigo) values
	(1,1), (1,2), (1,3), (1,4), (1,5), (1,6), (1,7),
    (2,1), (2,2), (2,3), (2,4), (2,5), (2,6), (2,7),
    (3,1), (3,2), (3,3), (3,4), (3,5), (3,6), (3,7),
    (4,1), (4,2), (4,3), (4,4), (4,5),
    (5,1), (5,2), (5,3), (5,4), (5,5), (5,6), (5,7),
    (6,4), (6,8), (6,9),
    (7,4), (7,8), (7,9),
    (8,8),
    (9,1), (9,2), (9,4), (9,6),
    (10,1), (10,2), (10,4), (10,6),
    (11,10), (11,11);

insert into tb_formaspgmt (for_formapgmt) values
	('Cartão de débito'), ('Cartão de crédito'), ('Pix'), ('Espécie');
    
insert into tb_cidades (cid_cidade) values ('Caicó'), ('Natal'), ('Jucurutu'), ('Jardim de Piranhas'), ('Jardim do Seridó'), ('Mossoró');

insert into tb_generos (gen_genero) values
	('Maculino'), ('Feminino'), ('Outro'), ('Prefiro não informar');