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
insert into tblProdutos (nome,valor,descricao,imagem,destaque,desconto) values('good burguer','12','fhyafusvfuyasgy','f4as8ds1d98s',12,2);

delete from tblProdutos where idProdutos>=0;

show tables;
desc tblUsuario;
select * from tblProdutos;
drop  table tblProdutos;