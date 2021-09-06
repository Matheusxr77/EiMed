-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Tempo de geração: 07-Ago-2021 às 22:26
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11
-- Autor: Matheus Marcos

CREATE DATABASE `eimed`;

USE `eimed`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de Dados: `eimed`
--

-----------------------------------------------------------

--
-- Estrutura da Tabela `user`
--

CREATE TABLE `user`(
	`id` int(11) auto_increment,
	`username` varchar(255) not null,
    `email` varchar(255) not null unique,
    `category` int(1) not null,
    `password` varchar(32) not null,
    primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Inserindo Dados na Tabela `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `category`, `password`) VALUES
(1, 'Matheus', 'matheus@gmail.com', '1', MDS('123'));
(2, 'Admin', 'admin@gmail.com', '1', MDS('admin'));

-----------------------------------------------------------

--
-- Estrutura da tabela `specialty`
--

CREATE TABLE `specialty`(
	`id` int(11) auto_increment,
    `specialty_name` varchar(255) not null unique, 
    primary key (`id`)
);

--
-- Inserindo dados na tabela `specialty``
--

INSERT INTO `specialty` (`id`, `specialty_name`) VALUES
(1, 'Cardiologia');
(2, 'Psiquiatria');
(3, 'Pediatria');
(4, 'Neurologia');

-----------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE `news`(
	`id` int(11) auto_increment,
    `news_name` varchar(255) not null unique,
    `publication_date` date not null,
	`author` varchar(255) not null,
    `place_occurrence` text not null,
    `news_image` varchar(255) not null,
    `content` text not null,
	`source` text not null,
    primary key (`id`)
);

--
-- Inserindo Dados na Tabela `news``
--

INSERT INTO `news` (`id`, `news_name`, `publication_date`, `author`, `place_occurrence`, `news_image`, `content`, `source`) VALUES
(1, 'Cardiologia em evolução', '12/10/2020', 'Julião', 'Brasília', '5fdc095c1ec11.jpg', 'um, dois, três indiozinhos', 'vozes da minha cabeça');

-----------------------------------------------------------

--
-- Estrutura da tabela `doctor`
--

CREATE TABLE `doctor`(
	`cpf` char(11) not null unique,
    `doctor_name` varchar(255) not null,
    `specialty` varchar(255) not null,
    `doctor_description` text not null,
    `doctor_image` varchar(255) not null,
	primary key (`cpf`)
);

--
-- Inserindo Dados na Tabela `doctor``
--

INSERT INTO `doctor` (`cpf`, `doctor_name`, `specialty`, `doctor_description`, `doctor_image`) VALUES
(11122233344, 'Zezinho', 'Cardiologia', 'Sou médico a mais de dez anos', '5fdc095c1ec11.jpg');

-----------------------------------------------------------

--
-- Estrutura da tabela `specialty_doctor`
--

CREATE TABLE `specialty_doctor`(
	`id` int(11) auto_increment,
    `FK_id_specialty` int(11),
    `FK_cpf_doctor` char(11),
    primary key (`id`),
    foreign key (`FK_id_specialty`) references `specialty`(`id`),
    foreign key (`FK_cpf_doctor`) references `doctor`(`cpf`)
);

-----------------------------------------------------------

--
-- Estrutura da tabela `hospital`
--

CREATE TABLE `hospital`(
	`hospital_cnpj` char(14) not null unique,
    `hospital_name` varchar(255) not null,
    `hospital_address_street` varchar(255) not null,
    `hospital_address_number` int(3),
    `hospital_address_complementary` varchar(255),
    `hospital_address_district` varchar(255) not null,
    `hospital_address_city` varchar(255) not null,
    `hospital_description` text not null,
    `hospital_image` varchar(255) not null,
    `hospital_office_hours` varchar(255) not null,
    primary key (`hospital_cnpj`)
);

--
-- Inserindo Dados na Tabela `hospital`
--

INSERT INTO `hospital` (`hospital_cnpj`, `hospital_name`, `hospital_address_street`, `hospital_address_number`, `hospital_address_complementary`, `hospital_address_district`, `hospital_address_city`, `hospital_description`, `hospital_image`, `hospital_office_hours`) VALUES
(11222333444455, 'São Gabriel', 'Rua Agamenon', 123, 'Perto do Grande Hotel', 'Centro', 'Caruaru', 'Mais de 30 anos no mercado', '5fdc095c1ec11.jpg', '12 às 32');

-----------------------------------------------------------

--
-- Estrutura da tabela `clinic`
--

CREATE TABLE `clinic`(
	`clinic_cnpj` char(14) not null unique,
    `clinic_name` varchar(255) not null,
    `clinic_address_street` varchar(255) not null,
    `clinic_address_number` int(3),
    `clinic_address_complementary` varchar(255),
    `clinic_address_district` varchar(255) not null,
    `clinic_address_city` varchar(255) not null,
    `clinic_description` text not null,
    `clinic_image` varchar(255) not null,
    `clinic_office_hours` varchar(255) not null,
    primary key (`clinic_cnpj`)
);

--
-- Inserindo Dados na Tabela `clinic``
--

INSERT INTO `clinic` (`clinic_cnpj`, `clinic_name`, `clinic_address_street`, `clinic_address_number`, `clinic_address_complementary`, `clinic_address_district`, `clinic_address_city`, `clinic_description`, `clinic_image`, `clinic_office_hours`) VALUES
(11222333444455, 'Mestre Vitalino', 'Rua Portugal', 123, 'Perto da Br', 'Centro', 'Caruaru', 'Mais de 70 anos no mercado', '5fdc095c1ec11.jpg', '24 horas');

-----------------------------------------------------------

--
-- Estrutura da tabela `doctor_works_hospital`
--

CREATE TABLE `doctor_works_hospital`(
	`id` int(11) auto_increment,
    `FK_cpf_doctor` char(11),
    `fk_hospital_cnpj` char(14),
    primary key (`id`),
    foreign key (`FK_cpf_doctor`) references `doctor`(`cpf`),
    foreign key (`fk_hospital_cnpj`) references `hospital`(`hospital_cnpj`)
);

-----------------------------------------------------------

--
-- Estrutura da tabela `doctor_works_clinic`
--

CREATE TABLE `doctor_works_clinic`(
	`id` int(11) auto_increment,
    `FK_cpf_doctor` char(11),
    `fk_clinic_cnpj` char(14),
    primary key (`id`),
    foreign key (`FK_cpf_doctor`) references `doctor`(`cpf`),
    foreign key (`fk_clinic_cnpj`) references `clinic`(`clinic_cnpj`)
);

-----------------------------------------------------------

--
-- Estrutura da tabela `treatment`
--

CREATE TABLE `treatment`(
	`id` int(11) auto_increment,
    `treatment_name` varchar(255) not null unique,
    `abstract` text not null,
    `treatment_image` varchar(255) not null,
    `treatment_content` text not null,
    primary key (`id`)
);

--
-- Inserindo Dados na Tabela `treatment``
--

INSERT INTO `treatment` (`id`, `treatment_name`, `abstract`, `treatment_image`, `treatment_content`) VALUES
(1, 'Vasectomia', 'É feita uma ruptura', '5fdc095c1ec11.jpg', 'O procedimento é feito...');

-----------------------------------------------------------

--
-- Estrutura da tabela `local_treatment_clinic`
--

CREATE TABLE `local_treatment_clinic`(
	`id` int(11) auto_increment,
    `FK_id_treatment` int(11),
    `FK_clinic_cnpj` char(14),
    primary key (`id`),
    foreign key (`FK_id_treatment`) references `treatment`(`id`),
    foreign key (`FK_clinic_cnpj`) references `clinic`(`clinic_cnpj`)
);

-----------------------------------------------------------

--
-- Estrutura da tabela `local_treatment_hospital`
--

CREATE TABLE `local_treatment_hospital`(
	`id` int(11) auto_increment,
    `FK_id_treatment` int(11),
    `FK_hospital_cnpj` char(14),
    primary key (`id`),
    foreign key (`FK_id_treatment`) references `treatment`(`id`),
    foreign key (`FK_hospital_cnpj`) references `hospital`(`hospital_cnpj`)
);

-----------------------------------------------------------

--
-- Estrutura da tabela `accident`
--

CREATE TABLE `accident`(
	`id` int(11) auto_increment,
    `accident_name` varchar(255) not null unique,
    `first_aid` text not null,
    `accident_image` varchar(255) not null,
    primary key (`id`)
);

--
-- Inserindo Dados na Tabela `accident`
--

INSERT INTO `accident` (`id`, `accident_name`, `first_aid`, `accident_image`) VALUES
(1, 'Queda de Moto', 'Verificar a existência de sangramento ', '5fdc095c1ec11.jpg');

-----------------------------------------------------------

--
-- Estrutura da tabela `illness`
--

CREATE TABLE `illness`(
	`id` int(11) auto_increment,
    `illness_name` varchar(255) not null unique,
    `illness_resume` text not null,
    `symptoms` text not null,
    `causes` text not null,
    `risk_column` text not null,
    `illness_image` varchar(255) not null,
    primary key (`id`)
);

--
-- Inserindo Dados na Tabela `illness`
--

INSERT INTO `illness` (`id`, `illness_name`, `illness_resume`, `symptoms`, `causes`, `risk_column`, `illness_image`) VALUES
(1, 'Rinite', 'problema respiratório..', 'corisa', 'genética', 'pessoas com problemas no pulmão', '5fdc095c1ec11.jpg');

-----------------------------------------------------------

--
-- Estrutura da tabela `treatment_accident`
--

CREATE TABLE `treatment_accident`(
	`id` int(11) auto_increment,
    `FK_id_treatment` int(11),
    `FK_id_accident` int(11),
    primary key (`id`),
    foreign key (`FK_id_treatment`) references `treatment`(`id`),
    foreign key (`FK_id_accident`) references `accident`(`id`)
);

-----------------------------------------------------------

--
-- Estrutura da tabela `treatment_illness`
--

CREATE TABLE `treatment_illness`(
	`id` int(11) auto_increment,
    `FK_id_treatment` int(11),
    `FK_id_illness` int(11),
    primary key (`id`),
    foreign key (`FK_id_treatment`) references `treatment`(`id`),
    foreign key (`FK_id_illness`) references `illness`(`id`)
);

SHOW TABLES;