create database dbgoodburguers;

show databases;

use dbGoodBurguers;

show tables;

select * from tblCategoria;

create table tblProdutos (
	idProdutos int not null auto_increment primary key,
    nome varchar(100) not null,
    valor varchar(45) not null,
	descricao TEXT not null,
    imagem varchar(45) not null,
    destaque tinyint,
    desconto tinyint,
    
    idCategoria int not null,
    constraint FK_idCategoria_tblProdutos 
    foreign key (idCategoria)
    references tblCategoria (idCategoria)
    
);

create table tblCategoria(
	idCategoria int not null auto_increment primary key,
	nome varchar(80)
);

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

show tables;
desc tblUsuario;
select * from tblCategoria;
drop  table tblProdutos;