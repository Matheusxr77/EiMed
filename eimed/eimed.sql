-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Tempo de geração: 07-Ago-2021 às 22:26
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11
-- Autor: Matheus Marcos Joel da Silva

CREATE DATABASE `eimed`;

USE `eimed`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database `eimed`

-- Table Structure `user`
CREATE TABLE `user`(
	`id` int auto_increment,
	`username` varchar(255) not null,
    `email` varchar(255) not null,
    `category` varchar(10) not null,
    `password` varchar(32) not null,
    primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserting Data into the Table `user`
INSERT INTO `user` (`id`, `username`, `email`, `category`, `password`) VALUES
(1, 'Matheus', 'matheus@gmail.com', '1', MD5('123')),
(2, 'Admin', 'admin@gmail.com', '1', MD5('admin'));

-- Table Structure `news`
CREATE TABLE `news`(
	`id` int auto_increment,
    `newsname` varchar(255) not null unique,
	`caption` varchar(255) not null,
    `datePublication` date not null,
	`author` varchar(255) not null,
    `placeOccurrence` text not null,
    `newsImage` text not null,
    `content` text not null,
	`source` text not null,
    primary key (`id`)
);

-- Inserting Data into the Table `news`
INSERT INTO `news` (`id`, `newsname`, `caption`, `datePublication`, `author`, `placeOccurrence`, `newsImage`, `content`, `source`) VALUES
(1, 'Cardiologia em evolução', 'Um mundo com o coração bem cuidado', '20/10/12', 'Julião Nobrega', 'Brasília', 'https://vizarbrasil.com.br/wp-content/uploads/2017/12/Screenshot-2017-12-6-shutterstock_504454465-jpg-imagem-JPEG-5056-%C3%97-3584-pixels-Redimensionada-26.png', 'Além de todos os prejuízos diretos que o novo coronavírus representou e representa para a saúde e para a sociedade, ele também foi capaz de promover um efeito paralisante em uma grande parcela da popu: cerca de 14 milhões de pessoas no Brasil negligenciaram tratamentos para doença cardiovascular, se negaram a buscar diagnóstico ou deixaram de lado ações preventivas e curativas.', 'vozes da minha cabeça');
INSERT INTO `news` (`id`, `newsname`, `caption`, `datePublication`, `author`, `placeOccurrence`, `newsImage`, `content`, `source`) VALUES
(2, 'Neurologia em evolução', 'Um mundo com o coração bem cuidado', '20/10/12', 'Julião', 'Brasília', 'https://medicina.ucpel.edu.br/wp-content/uploads/2020/05/apacucpel_ucpel_image_328-1024x960.jpeg', 'Médicos canadenses temem estar lidando com uma doença cerebral até então desconhecida em meio a uma série de casos envolvendo perda de memória, alucinações e atrofia muscular. Os casos foram registrados na província de New Brunswick e especialistas dizem que há muito mais perguntas do que respostas, pedindo que o público não entre em pânico.Por mais de um ano, as autoridades de saúde pública rastrearam 43 casos de suspeita de doença neurológica na província, todos sem causas conhecidas.', 'vozes da minha cabeça');

-- Table Structure `depositions`
CREATE TABLE `depositions`(
	`id` int auto_increment,
    `depositionsName` varchar(255) not null,
    `depositionsEmail` varchar(255) not null,
    `depositionsSubject` varchar(255) not null,
    `depositionsMessage` text not null,
	primary key (`id`)
);

-- Inserting Data into the Table `depositions`
INSERT INTO `depositions` (`id`, `depositionsName`, `depositionsEmail`, `depositionsSubject`, `depositionsMessage`) VALUES
(1, 'João', 'joao@gmail.com', 'Elogiar', 'muito bom'),
(2, 'Augusta', 'augusta@gmail.com', 'Crítica', 'razoável');

-- Table Structure `doctor`
CREATE TABLE `doctor`(
	`id` int auto_increment,
	`doctor_name` varchar(255) not null,
	`crm` int(6) not null unique,
	`rqe` int(5) not null unique,
    `specialty` varchar(255) not null,
    `doctor_image` varchar(255) not null,
	`doctor_address_street` varchar(255) not null,
    `doctor_address_number` int(10),
    `doctor_address_complementary` varchar(255) not null,
    `doctor_address_district` varchar(255) not null,
    `doctor_address_city` varchar(255) not null,
	`doctor_address_state` varchar(255) not null,
	`doctor_contact` varchar(11) not null,
	`doctor_description` text not null,
	primary key (`id`)
);

-- Inserting Data into the Table `doctor`
INSERT INTO `doctor` (`id`, `doctor_name`, `crm`, `rqe`, `specialty`, `doctor_image`, `doctor_address_street`, `doctor_address_number`, `doctor_address_complementary`, `doctor_address_district`, `doctor_address_city`, `doctor_address_state`, `doctor_contact`, `doctor_description`) VALUES
('1', 'Owen Hunt', 111111, 11111, 'Cardiologia', 'https://upload.wikimedia.org/wikipedia/pt/6/60/Owen_Hunt.jpg', 'José Felismino', '232', 'Próximo à rodoviária', 'Cidade Alta', 'Caruaru', 'Pernambuco', '81971015123', 'Sou médico a mais de dez anos'),
('2', 'Joaquim', 222222, 22222, 'Neurologia', 'https://i2.wp.com/casufunec.com/wp-content/uploads/2021/04/Dr.-Klinger-Faico.jpg?w=1200&amp;ssl=1', 'Luis Pessoa', '201', 'Próximo ao presídio', 'Santa Rosa', 'Caruaru', 'Pernambuco', '81982324556', 'Sempre cuidando da sua saúde mental'),
('3', 'Carolina', 333333, 33333, 'Fisioterapia', 'https://medicina.ucpel.edu.br/wp-content/uploads/2020/07/apacucpel_ucpel_image_319-1024x960.jpeg', 'Santa Joanna', '212', 'Perto da ponte', 'Santa Rosa', 'Caruaru', 'Pernambuco', '81291212233', 'A melhor no que faz');

-- Table Structure `hospital`
CREATE TABLE `hospital`(
	`id` int auto_increment,
	`hospital_cnpj` varchar(14) not null,
    `hospital_name` varchar(255) not null,
	`hospital_specialty` varchar(255) not null,
	`hospital_image` varchar(255) not null,
    `hospital_address_street` varchar(255) not null,
    `hospital_address_number` int,
    `hospital_address_complementary` varchar(255) not null,
    `hospital_address_district` varchar(255) not null,
    `hospital_address_city` varchar(255) not null,
	`hospital_address_state` varchar(255) not null,
    `hospital_description` text not null,
	`hospital_contact` varchar(11) not null,
    `hospital_office_hours` varchar(255) not null,
    primary key (`id`)
);

-- Inserting Data into the Table `hospital`
INSERT INTO `hospital` (`id`, `hospital_cnpj`, `hospital_name`, `hospital_specialty`, `hospital_image`, `hospital_address_street`, `hospital_address_number`, `hospital_address_complementary`, `hospital_address_district`, `hospital_address_city`, `hospital_address_state`, `hospital_description`, `hospital_contact`, `hospital_office_hours`) VALUES
(1, 11111111111111, 'São Gabriel', 'Cardiologia, Neurologia, Pediatria', 'http://www.brplanosdesaude.com.br/imagens/conteudo/Hospitais/green02.jpg', 'Agamenon', 123, 'Perto do Grande Hotel', 'Centro', 'Caruaru', 'Pernambuco', 'Mais de 30 anos no mercado', '37012321', '12 às 22');
(2, 22222222222222, 'Mestre Vitalino', 'Traumatologia, Neurologia, Cardiologia e Psiquiatria', 'https://lh3.googleusercontent.com/proxy/z24sP69sdOQ7EWCC8nedLcwqKAd38rUxW9EU70Kq3BDBJX9kXO4elZHHGdiKWvFlsKu1HV4NhPwQDsVVbO7e0jNJFiHV0xB2L9ybgDGGpXVMAF4_yOubfxvbHuhawJGc-Ojxd7AuJNE_Cxvs0CfYdHqprgfud7Tvs8gfKGAmdjCjwypUGaaKUU1nZjTp7xU7Ajla0m3rJ_wC5EQ_', 'Soares', 021, 'Margens da BR 104', 'Luis Gonzaga', 'Caruaru', 'Pernambuco', 'Referência em controle de emergências', '32932221', '24 horas');

-- Table Structure `clinic`
CREATE TABLE `clinic`(
	`id` int auto_increment,
	`clinic_cnpj` varchar(14) not null unique,
    `clinic_name` varchar(255) not null,
	`clinic_specialty` varchar(255) not null,
	`clinic_image` varchar(255) not null,
    `clinic_address_street` varchar(255) not null,
    `clinic_address_number` int,
    `clinic_address_complementary` varchar(255),
    `clinic_address_district` varchar(255) not null,
    `clinic_address_city` varchar(255) not null,
	`clinic_address_state` varchar(255) not null,
    `clinic_description` text not null,
	`clinic_contact` varchar(11) not null,
    `clinic_office_hours` varchar(255) not null,
    primary key (`id`)
);

-- Inserting Data into the Table `clinic`
INSERT INTO `clinic` (`id`, `clinic_cnpj`, `clinic_name`, `clinic_specialty`, `clinic_image`, `clinic_address_street`, `clinic_address_number`, `clinic_address_complementary`, `clinic_address_district`, `clinic_address_city`, `clinic_address_state`, `clinic_description`, `clinic_contact`, `clinic_office_hours`) VALUES
(1, 11222333444455, 'Manoel Florêncio', 'Odontologia', 'https://www.terapyas.com.br/imgempresas/clinica-manoel-florencio-carua-12715-3d4m.jpg', 'Portugal', 123, 'Perto do Grande Hotel', 'Centro', 'Caruaru', 'Pernambuco', 'Mais de 70 anos no mercado', '30720232', '24 horas'),
(2, 55555555555555, 'Multmédica', 'Ortopedia e Neurocirurgia', 'https://amorsaude.com.br/wp-content/uploads/2019/05/89c628da-7ea1-432c-b749-b907cf1d1578.jpg', 'Deputado Souto Filho', 53, 'Próxima a Avenida Agamenôn', 'Maurício de Nassau', 'Caruaru', 'Pernambuco', 'Compromisso e qualidade', '31378888', '8 às 18');

-- Table Structure `donations`
CREATE TABLE `donations`(
	`id` int auto_increment,
    `donations_name` varchar(255) not null,
	`donations_type` varchar(255) not null,
	`donations_image` varchar(255) not null,
    `donations_address_street` varchar(255) not null,
    `donations_address_number` int,
    `donations_address_complementary` varchar(255),
    `donations_address_district` varchar(255) not null,
    `donations_address_city` varchar(255) not null,
	`donations_address_state` varchar(255) not null,
    `donations_description` text not null,
	`donations_contact` varchar(11) not null,
    `donations_office_hours` varchar(255) not null,
    primary key (`id`)
);

-- Inserting Data into the Table `donations``
INSERT INTO `donations` (`id`, `donations_name`, `donations_type`, `donations_image`, `donations_address_street`, `donations_address_number`, `donations_address_complementary`, `donations_address_district`, `donations_address_city`, `donations_address_state`, `donations_description`, `donations_contact`, `donations_office_hours`) VALUES
(1, 'Hemope', 'Sangue', 'https://www.caruaru.pe.leg.br/institucional/noticias/leonardo-confirma-presenca-em-evento-do-hemope-caruaru/image', ' Oswaldo Cruz', '0', 'Perto do Shopping', 'Maurício de Nassau', 'Caruaru', 'Pernambuco', 'Trazendo esperança a todos', '3719-9565', '7:30 às 17'),
(2, 'Casa dos Pobres São Francisco de Assis', 'Utensílios', 'https://s2.glbimg.com/Yea0bti9uujTG-cSHRlYe57xlcw=/0x0:4608x3456/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2018/M/P/QFy3J9QYiduVLEBHAf3g/casa.jpg', 'Lourival José da Silva', 483, 'Próxima à Feira de Artesanato', 'Petrópolis', 'Caruaru', 'Pernambuco', 'Há 70 anos cuidando daqueles que mais viveram', '3721-4325', '7:30 às 17');

-- Table Structure `accident`
CREATE TABLE `accident`(
	`id` int auto_increment,
    `accident_name` varchar(255) not null unique,
    `first_aid` text not null,
    `accident_image` varchar(255) not null,
    primary key (`id`)
);

-- Inserting Data into the Table `accident`
INSERT INTO `accident` (`id`, `accident_name`, `first_aid`, `accident_image`) VALUES
(1, 'Queda de Moto', 'mantenha a calma em um primeiro momento e acione o socorro o mais rápido possível. Motociclista caído: se o motociclista estiver caído, o primeiro passo é verificar se ele está consciente. Se sim, mantenha-o acordado, conversando, mas em hipótese alguma tente ajudá-lo a levantar.', 'https://alofrutal.com.br/hf-conteudo/uploads/posts/2021/09/1810_moto-caida-png.png'),
(2, 'Dedo Cortado', 'Para fazer um curativo simples de um corte, de forma rápida e correta, deve-se: Lavar a ferida com água fria corrente e sabão neutro ou soro fisiológico; Secar a ferida com gaze seca ou pano limpo; Cobrir a ferida com gaze seca e prendê-la com um esparadrapo, band-aid ou curativo pronto, que se vende em farmácias. Caso a ferida seja grande ou esteja muito suja, depois de fazer a lavagem, é aconselhado passar um produto antisséptico. No entanto, este tipo de substância só deve ser usada até que se forme uma casca no local da ferida. Quando a casca aparece, a ferida está fechada e não apresenta risco de infeccionar. Os produtos antissépticos não devem ser a primeira escolha para limpar as feridas simples, deve-se dar preferência para água ou soro fisiológico. O curativo deve ser trocado, no máximo, em 48 horas ou sempre que estiver sujo.', 'https://uploads.metropoles.com/wp-content/uploads/2020/06/29122511/Dedo-cortado.jpg');

-- Table Structure `illness`
CREATE TABLE `illness`(
	`id` int auto_increment,
    `illness_name` varchar(255) not null unique,
    `illness_resume` text not null,
    `symptoms` text not null,
    `causes` text not null,
    `illness_image` varchar(255) not null,
    primary key (`id`)
);

-- Inserting Data into the Table `illness`
INSERT INTO `illness` (`id`, `illness_name`, `illness_resume`, `symptoms`, `causes`, `illness_image`) VALUES
(1, 'Rinite', 'A rinite aguda ou infecciosa é aquela inflamação das mucosas do nariz cujos sintomas podem durar de 7 a 10 dias, sendo que essa condição pode ser chamada também de resfriado.', 'congestão nasal, obstrução da região nasal, coriza, coceira e ardor no nariz e olhos, espirro, tosse, olhos com lacrimejamento e roncos nasais', 'Resfriados e alergias são as causas mais comuns de rinites. Os sintomas da rinite incluem corrimento nasal, espirros e congestão nasal. O diagnóstico baseia-se nesses sintomas típicos.', 'https://static.tuasaude.com/media/article/jm/uy/tratamento-para-rinite-alergica_40012_l.jpg'),
(2, 'Leucemia', 'A leucemia é uma doença maligna dos glóbulos brancos, geralmente, de origem desconhecida. Tem como principal característica o acúmulo de células doentes na medula óssea, que substituem as células sanguíneas normais.', 'Os principais sintomas decorrem do acúmulo de células defeituosas na medula óssea, prejudicando ou impedindo a produção das células sanguíneas normais. A diminuição dos glóbulos vermelhos ocasiona anemia, cujos sintomas incluem: fadiga, falta de ar, palpitação, dor de cabeça, entre outros. A redução dos glóbulos brancos provoca baixa da imunidade, deixando o organismo mais sujeito a infecções muitas vezes graves ou recorrentes. A diminuição das plaquetas ocasiona sangramentos, sendo os mais comuns das gengivas e pelo nariz e manchas roxas (equimoses) e/ou pontos roxos (petéquias) na pele. O paciente pode apresentar gânglios linfáticos inchados, mas sem dor, principalmente na região do pescoço e das axilas; febre ou suores noturnos; perda de peso sem motivo aparente; desconforto abdominal (provocado pelo inchaço do baço ou fígado); dores nos ossos e nas articulações. Caso a doença afete o Sistema Nervoso Central (SNC), podem surgir dores de cabeça, náuseas, vômitos, visão dupla e desorientação Depois de instalada, a doença progride rapidamente, exigindo que o tratamento seja iniciado logo após o diagnóstico e a classificação da leucemia.', 'A origem desse câncer ainda é desconhecida. O que se sabe é que certos fatores podem aumentar o risco de ele surgir. Entram na lista substâncias químicas, como o benzeno, formadeíldos e agrotóxicos.', 'https://hemocord.com.br/wp-content/uploads/2015/05/leucemia2.jpg');