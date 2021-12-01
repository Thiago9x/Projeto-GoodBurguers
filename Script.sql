create database dbgoodburguers;

show databases;

use dbGoodBurguers;

show tables;
drop table tblProdutos;
select * from tblProdutos;

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
select * from tblUsuario;
create table tblUsuario(
	idUsuario int not null auto_increment primary key,
	nome varchar(80),
    senha varchar(45)
);
drop table tblUsuario;
create table tblContato(
	idContato int not null auto_increment primary key,
	email varchar(100),
    telefone varchar(45),
    celular varchar(45)
);
insert into tblProdutos(id,nome,valor,descricao,imagem,destaque,desconto) values(1,'good burguer','12','fhyafusvfuyasgy','f4as8ds1d98s',12,2)from tblProdutos;

show tables;
desc tblUsuario;
select * from tblCategoria;
drop  table tblProdutos;