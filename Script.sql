create database dbgoodburguers;

show databases;

use dbGoodBurguers;

create table tblProdutos (
	idProdutos int not null auto_increment primary key,
    nome varchar(100) not null,
    valor varchar(45) not null,
	descricao TEXT not null,
    imagem varchar(45) not null,
    destaque tinyint,
    desconto tinyint
);

create table tblCategoria(
	idCategoria int not null auto_increment primary key,
	nome varchar(80)
);

create table tblUsuario(
	idUsuario int not null auto_increment primary key,
	nome varchar(80),
    nomeUsuario varchar(80),
    senha varchar(45)
);

create table tblContato(
	idContato int not null auto_increment primary key,
	email varchar(100),
    telefone varchar(45),
    celular varchar(45)
);
drop table tblContato;

show tables;

select * from tblCategoria;
