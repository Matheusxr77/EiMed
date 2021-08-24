CREATE DATABASE EiMed;

USE EiMed;

CREATE TABLE Usuario(
	ID int auto_increment,
	Nome varchar(100) not null,
    Email varchar(100) not null unique,
    Categoria varchar(50) not null,
    Senha varchar(50) not null,
    primary key (ID)
);

CREATE TABLE Noticia(
	ID int auto_increment,
    Nome varchar(200) not null unique,
    Data_Publicado date not null,
    Fonte text not null,
    Local_Ocorrencia text not null,
    Imagem longblob,
    Conteudo text not null,
    primary key (ID)
);

CREATE TABLE Especialidade(
	ID int auto_increment,
    Nome varchar(100) not null unique, 
    primary key (ID)
);

CREATE TABLE Medico(
	CPF char(11) not null unique,
    Nome varchar(150) not null,
    Avaliacao int,
    Formacao varchar(255) not null,
    Descricao text,
    Imagem longblob not null,
	primary key (CPF)
);

CREATE TABLE Especialidade_Medico(
	ID int auto_increment,
    FK_ID_Especialidade int,
    FK_CPF_Medico char(11),
    primary key (ID),
    foreign key (FK_ID_Especialidade) references Especialidade(ID),
    foreign key (FK_CPF_Medico) references Medico(CPF)
);

CREATE TABLE Hospital(
	CNPJ char(14) not null unique,
    Nome varchar(150) not null,
    Avaliacao int,
    Endereco_Rua varchar(120) not null,
    Endereco_Numero int,
    Endereco_Complemento varchar(150),
    Endereco_Bairro varchar(100) not null,
    Endereco_Cidade varchar(100) not null,
    Descricao text,
    Imagem longblob not null,
    Horario_Atendimento int not null,
    primary key (CNPJ)
);

CREATE TABLE Clinica(
	CNPJ char(14) not null unique,
    Nome varchar(150) not null,
    Avaliacao int,
    Endereco_Rua varchar(120) not null,
    Endereco_Numero int,
    Endereco_Complemento varchar(150),
    Endereco_Bairro varchar(100) not null,
    Endereco_Cidade varchar(100) not null,
    Descricao text,
    Imagem longblob not null,
    Horario_Atendimento int not null,
    primary key (CNPJ)
);

CREATE TABLE Medico_Trabalha_Hospital(
	ID int auto_increment,
    FK_CPF_Medico char(11),
    FK_CNPJ_Hospital char(14),
    primary key (ID),
    foreign key (FK_CPF_Medico) references Medico(CPF),
    foreign key (FK_CNPJ_Hospital) references Hospital(CNPJ)
);

CREATE TABLE Medico_Trabalha_Clinica(
	ID int auto_increment,
    FK_CPF_Medico char(11),
    FK_CNPJ_Clinica char(14),
	primary key (ID),
    foreign key (FK_CPF_Medico) references Medico(CPF),
	foreign key (FK_CNPJ_Clinica) references Clinica(CNPJ)
);

CREATE TABLE Tratamento(
	ID int auto_increment,
    Nome varchar(250) not null unique,
    Resumo text not null,
    Video longblob,
    Imagem longblob,
    Conteudo text not null,
    primary key (ID)
);

CREATE TABLE Local_Tratamento_Clinica(
	ID int auto_increment,
    FK_ID_Tratamento int,
    FK_CNPJ_Clinica char(14),
    primary key (ID),
    foreign key (FK_ID_Tratamento) references Tratamento(ID),
    foreign key (FK_CNPJ_Clinica) references Clinica(CNPJ)
);

CREATE TABLE Local_Tratamento_Hospital(
	ID int auto_increment,
	FK_ID_Tratamento int,
    FK_CNPJ_Hospital char(14),
    primary key (ID),
	foreign key (FK_ID_Tratamento) references Tratamento(ID),
    foreign key (FK_CNPJ_Hospital) references Hospital(CNPJ)
);

CREATE TABLE Acidente(
	ID int auto_increment,
    Nome varchar(250) not null unique,
    Situacao text not null,
    Primeiros_Socorros text not null,
    Video longblob,
    Imagem longblob,
    primary key (ID)
);

CREATE TABLE Doenca(
	ID int auto_increment,
    Nome varchar(250) not null unique,
    Resumo text not null,
    Sintomas text not null,
    Causas text not null,
    Coluna_Risco text not null,
    Imagem longblob,
    primary key (ID)
);

CREATE TABLE Tratamento_Doenca(
	ID int auto_increment,
    FK_ID_Tratamento int,
    FK_ID_Doenca int,
    primary key (ID),
    foreign key (FK_ID_Tratamento) references Tratamento(ID),
    foreign key (FK_ID_Doenca) references Doenca(ID)
);

CREATE TABLE Tratamento_Acidente(
	ID int auto_increment,
    FK_ID_Tratamento int,
    FK_ID_Acidente int,
	primary key (ID),
    foreign key (FK_ID_Tratamento) references Tratamento(ID),
    foreign key (FK_ID_Acidente) references Acidente(ID)
);

SHOW TABLES;