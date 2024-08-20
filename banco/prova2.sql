DROP DATABASE if EXISTS Prova2;
CREATE DATABASE Prova2;

USE Prova2;

CREATE TABLE fluxo_caixa (
    id integer not null auto_increment,
    data date not null,
    tipo varchar(10),
    valor decimal(10,2) not null,
    historico varchar(150) not null,
    cheque varchar(3) not null,
    PRIMARY KEY (id)
);

