/*Cria um novo database*/
create database dbcontatos20212t;

/*Permite selecionar o database a ser utilizado*/
use dbcontatos20212t;

/*Cria uma nova tabela*/
CREATE TABLE tblcliente (
  idcliente int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome varchar(100) NOT NULL,
  rg varchar(15) NOT NULL,
  cpf varchar(20) NOT NULL,
  telefone varchar(16),
  celular varchar(17) ,
  email varchar(60),
  obs text
); 

/*Permite visualizar a estrutura criada da tabela*/
desc tblcliente;

/*Seleciona todos os dados de uma tabela*/
select * from tblcliente;

/*Insere dados em uma tabela*/
insert into tblcliente ( nome, rg, cpf, telefone, celular, email, obs ) values ( 'Maria', 'dfg', '456456456456', 'sdfsdf', 'sdffdsf', 'marcel.nt@gmail.com', 'sdsf sfsd fsdf ' );