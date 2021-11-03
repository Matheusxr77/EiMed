-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2021 às 15:37
-- Versão do servidor: 8.0.26
-- versão do PHP: 7.3.29
-- Autor: Matheus Marcos Joel da Silva

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eimed`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `accident`
--

CREATE TABLE `accident` (
  `id` int NOT NULL,
  `accident_name` varchar(255) NOT NULL,
  `first_aid` text NOT NULL,
  `accident_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `accident`
--

INSERT INTO `accident` (`id`, `accident_name`, `first_aid`, `accident_image`) VALUES
(1, 'Batida de Moto', 'mantenha a calma em um primeiro momento e acione o socorro o mais rápido possível. Motociclista caído: se o motociclista estiver caído, o primeiro passo é verificar se ele está consciente. Se sim, mantenha-o acordado, conversando, mas em hipótese alguma tente ajudá-lo a levantar.', 'https://alofrutal.com.br/hf-conteudo/uploads/posts/2021/09/1810_moto-caida-png.png'),
(2, 'Dedos Cortados', 'Para fazer um curativo simples de um corte, de forma rápida e correta, deve-se: Lavar a ferida com água fria corrente e sabão neutro ou soro fisiológico; Secar a ferida com gaze seca ou pano limpo; Cobrir a ferida com gaze seca e prendê-la com um esparadrapo, band-aid ou curativo pronto, que se vende em farmácias. Caso a ferida seja grande ou esteja muito suja, depois de fazer a lavagem, é aconselhado passar um produto antisséptico. No entanto, este tipo de substância só deve ser usada até que se forme uma casca no local da ferida. Quando a casca aparece, a ferida está fechada e não apresenta risco de infeccionar. Os produtos antissépticos não devem ser a primeira escolha para limpar as feridas simples, deve-se dar preferência para água ou soro fisiológico. O curativo deve ser trocado, no máximo, em 48 horas ou sempre que estiver sujo.', 'https://uploads.metropoles.com/wp-content/uploads/2020/06/29122511/Dedo-cortado.jpg'),
(3, 'Afogamento', 'Reconhecer o afogamento, observando se a pessoa está com os braços estendidos, lutando para não ficar debaixo da água, pois muitas vezes, por causa do desespero a pessoa nem sempre consegue gritar ou chamar por ajuda; Pedir ajuda para outra pessoa que esteja próxima ao local, para que ambas possam seguir com o socorro; Ligar imediatamente para a ambulância dos bombeiros no 193, caso não seja possível, deve-se ligar para SAMU no 192; Fornecer algum material flutuante para a pessoa que esteja se afogando, com auxílio de garrafas de plástico, pranchas de surf e materiais de isopor ou de espumas; Tentar realizar o socorro sem entrar na água. Caso a pessoa se encontre a menos de 4 metros de distância, é possível estender um galho ou cabo de vassoura, entretanto, se a vítima tiver entre 4 e 10 metros de distância, pode-se jogar uma boia com uma corda, segurando na extremidade oposta. Porém, se a vítima estiver bem próxima, é importante oferecer sempre o pé ao invés da mão, pois com o nervosismo, a vítima pode puxar a outra pessoa para dentro da água; Apenas entrar na água se souber nadar; Caso a pessoa seja retirada da água, é importante verificar a respiração, durante 10 segundos, observando os movimentos do tórax, ouvindo o som do ar saindo pelo nariz e sentindo o ar que sai pelo nariz. Se estiver respirando, é importante deixar a pessoa deitada de lado até que os bombeiros ou o SAMU cheguem ao local; Verificar se a pessoa tem batimentos cardíacos, colocando os dedos indicador e médio no pulso da pessoa ou na artéria carótida no pescoço, e contando as pulsações durante 10 segundos. O normal é que a pessoa tenha 10 a 16 pulsações em 10 segundos, ou 60 a 100 batimentos cardíacos por minuto.', 'http://www.agenciabrasilia.df.gov.br/media/k2/items/src/d119d82c0c15736bc4605bacfdcf0b67.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clinic`
--

CREATE TABLE `clinic` (
  `id` int NOT NULL,
  `clinic_cnpj` varchar(14) NOT NULL,
  `clinic_name` varchar(255) NOT NULL,
  `clinic_specialty` varchar(255) NOT NULL,
  `clinic_image` varchar(255) NOT NULL,
  `clinic_address_street` varchar(255) NOT NULL,
  `clinic_address_number` int DEFAULT NULL,
  `clinic_address_complementary` varchar(255) DEFAULT NULL,
  `clinic_address_district` varchar(255) NOT NULL,
  `clinic_address_city` varchar(255) NOT NULL,
  `clinic_address_state` varchar(255) NOT NULL,
  `clinic_description` text NOT NULL,
  `clinic_contact` varchar(11) NOT NULL,
  `clinic_office_hours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `clinic`
--

INSERT INTO `clinic` (`id`, `clinic_cnpj`, `clinic_name`, `clinic_specialty`, `clinic_image`, `clinic_address_street`, `clinic_address_number`, `clinic_address_complementary`, `clinic_address_district`, `clinic_address_city`, `clinic_address_state`, `clinic_description`, `clinic_contact`, `clinic_office_hours`) VALUES
(1, '11222333444455', 'Manoel Florêncio', 'Odontologia', 'https://www.terapyas.com.br/imgempresas/clinica-manoel-florencio-carua-12715-3d4m.jpg', 'Rua Portugal', 123, 'Perto do Grande Hotel', 'Centro', 'Caruaru', 'Pernambuco', 'Mais de 70 anos no mercado', '30720232', '24 horas'),
(2, '55555555555555', 'Multmédica', 'Ortopedia e Neurocirurgia', 'https://amorsaude.com.br/wp-content/uploads/2019/05/89c628da-7ea1-432c-b749-b907cf1d1578.jpg', 'Deputado Souto Filho', 53, 'Próxima a Avenida Agamenôn', 'Maurício de Nassau', 'Caruaru', 'Pernambuco', 'Compromisso e qualidade', '31378888', '8 às 18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `depositions`
--

CREATE TABLE `depositions` (
  `id` int NOT NULL,
  `depositionsName` varchar(255) NOT NULL,
  `depositionsEmail` varchar(255) NOT NULL,
  `depositionsSubject` varchar(255) NOT NULL,
  `depositionsMessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `depositions`
--

INSERT INTO `depositions` (`id`, `depositionsName`, `depositionsEmail`, `depositionsSubject`, `depositionsMessage`) VALUES
(1, 'João', 'joao@gmail.com', 'Elogiar', 'muito bom'),
(2, 'Matheus', 'suehtamxr77@gmail.com', 'Elogio', 'parabéns'),
(3, 'José', 'jose@gmail.com', 'Elogio', 'boa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doctor`
--

CREATE TABLE `doctor` (
  `id` int NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `crm` int NOT NULL,
  `rqe` int NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `doctor_image` varchar(255) NOT NULL,
  `doctor_address_street` varchar(255) NOT NULL,
  `doctor_address_number` int DEFAULT NULL,
  `doctor_address_complementary` varchar(255) DEFAULT NULL,
  `doctor_address_district` varchar(255) NOT NULL,
  `doctor_address_city` varchar(255) NOT NULL,
  `doctor_address_state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `doctor_contact` varchar(11) NOT NULL,
  `doctor_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `doctor`
--

INSERT INTO `doctor` (`id`, `doctor_name`, `crm`, `rqe`, `specialty`, `doctor_image`, `doctor_address_street`, `doctor_address_number`, `doctor_address_complementary`, `doctor_address_district`, `doctor_address_city`, `doctor_address_state`, `doctor_contact`, `doctor_description`) VALUES
(1, 'Owen Hunt', 111111, 11111, 'Cardiologia', 'https://upload.wikimedia.org/wikipedia/pt/6/60/Owen_Hunt.jpg', 'José Felismino', 232, 'Próximo à rodoviária', 'Cidade Alta', 'Caruaru', 'Pernambuco', '81971015123', 'Sou médico a mais de dez anos'),
(2, 'Caroline', 333333, 33333, 'Fisioterapia', 'https://medicina.ucpel.edu.br/wp-content/uploads/2020/07/apacucpel_ucpel_image_319-1024x960.jpeg', 'Santa Joanna', 231, 'Perto da ponte', 'Santa Clara', 'Caruaru', 'Pernambuco', '81923223234', 'A melhor naquilo que faz'),
(3, 'Alex Karev', 999999, 99999, 'Pediatria', 'https://upload.wikimedia.org/wikipedia/pt/2/2b/Alex_Karev.jpg', 'Rua José Felismino', 6757, 'Perto da ponte', 'Cultural', 'Riacho das Almas', 'Pernambuco', '81982324556', 'A melhor naquilo que faz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `donations`
--

CREATE TABLE `donations` (
  `id` int NOT NULL,
  `donations_name` varchar(255) NOT NULL,
  `donations_type` varchar(255) NOT NULL,
  `donations_image` varchar(255) NOT NULL,
  `donations_address_street` varchar(255) NOT NULL,
  `donations_address_number` int DEFAULT NULL,
  `donations_address_complementary` varchar(255) DEFAULT NULL,
  `donations_address_district` varchar(255) NOT NULL,
  `donations_address_city` varchar(255) NOT NULL,
  `donations_address_state` varchar(255) NOT NULL,
  `donations_description` text NOT NULL,
  `donations_contact` varchar(11) NOT NULL,
  `donations_office_hours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `donations`
--

INSERT INTO `donations` (`id`, `donations_name`, `donations_type`, `donations_image`, `donations_address_street`, `donations_address_number`, `donations_address_complementary`, `donations_address_district`, `donations_address_city`, `donations_address_state`, `donations_description`, `donations_contact`, `donations_office_hours`) VALUES
(2, 'Casa dos Pobres São Francisco de Assis', 'Utensílios', 'https://s2.glbimg.com/Yea0bti9uujTG-cSHRlYe57xlcw=/0x0:4608x3456/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2018/M/P/QFy3J9QYiduVLEBHAf3g/casa.jpg', 'Lourival José da Silva', 483, 'Próxima à Feira de Artesanato', 'Petrópolis', 'Caruaru', 'Pernambuco', 'Há 70 anos cuidando daqueles que mais viveram', '3721-4325', '7:30 às 17'),
(3, 'Hemope', 'Sangue', 'http://radioculturadonordeste.com.br/wp-content/uploads/2019/06/9-hemope-caruaru.jpg', 'Manoel Borba', 1232, 'Atacadista', 'Centro', 'Caruaru', 'Pernambuco', 'Ótimo atendimento', '12324434', '7 Às 23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospital`
--

CREATE TABLE `hospital` (
  `id` int NOT NULL,
  `hospital_cnpj` varchar(14) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_specialty` varchar(255) NOT NULL,
  `hospital_image` varchar(255) NOT NULL,
  `hospital_address_street` varchar(255) NOT NULL,
  `hospital_address_number` int DEFAULT NULL,
  `hospital_address_complementary` varchar(255) NOT NULL,
  `hospital_address_district` varchar(255) NOT NULL,
  `hospital_address_city` varchar(255) NOT NULL,
  `hospital_address_state` varchar(255) NOT NULL,
  `hospital_description` text NOT NULL,
  `hospital_contact` varchar(11) NOT NULL,
  `hospital_office_hours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `hospital`
--

INSERT INTO `hospital` (`id`, `hospital_cnpj`, `hospital_name`, `hospital_specialty`, `hospital_image`, `hospital_address_street`, `hospital_address_number`, `hospital_address_complementary`, `hospital_address_district`, `hospital_address_city`, `hospital_address_state`, `hospital_description`, `hospital_contact`, `hospital_office_hours`) VALUES
(1, '22222222222222', 'Mestre Vitalino', 'Traumatologia, Neurologia, Cardiologia e Psiquiatria', 'https://cdn.folhape.com.br/img/c/1200/900/dn_arquivo/2017/09/hmv.jpg', 'Avenida Soares', 2145, 'Margens da BR 104', 'Luis Gonzaga', 'Caruaru', 'Pernambuco', 'Referência em controle de emergências', '32932221', '24 horas'),
(2, '33333333333333', 'Santa Efigênia', 'Pediatria, Cardiologia, Psicologia e Psiquiatria', 'https://www.gncnews.com.br/assets/uploads/21e52e7bfa2682877d0aad72ff409bf5.jpeg', 'Santa Efigênia', 1, 'Próxima ao posto', 'Maurício de Nassau', 'Caruaru', 'Pernambuco', 'Referência em bom atendimento', '30612025', '8 às 22'),
(3, '12312432454323', 'Sant Rose Bonaventure', 'Patologia, Cardiologia e Psiquiatria', 'https://www.mercurynews.com/wp-content/uploads/2017/11/sjm-l-pizarro-col-1105.jpg', 'Carolina de Jesus', 324, 'Na rua do posto', 'Maurício de Nassau', 'Belém', 'Pará', 'Referência em bom atendimento', '30612025', '8 às 22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `illness`
--

CREATE TABLE `illness` (
  `id` int NOT NULL,
  `illness_name` varchar(255) NOT NULL,
  `illness_resume` text NOT NULL,
  `symptoms` text NOT NULL,
  `causes` text NOT NULL,
  `illness_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `illness`
--

INSERT INTO `illness` (`id`, `illness_name`, `illness_resume`, `symptoms`, `causes`, `illness_image`) VALUES
(4, 'Leucemia', 'A leucemia é uma doença maligna dos glóbulos brancos, geralmente, de origem desconhecida. Tem como principal característica o acúmulo de células doentes na medula óssea, que substituem as células sanguíneas normais.', 'Os principais sintomas decorrem do acúmulo de células defeituosas na medula óssea, prejudicando ou impedindo a produção das células sanguíneas normais. A diminuição dos glóbulos vermelhos ocasiona anemia, cujos sintomas incluem: fadiga, falta de ar, palpitação, dor de cabeça, entre outros. A redução dos glóbulos brancos provoca baixa da imunidade, deixando o organismo mais sujeito a infecções muitas vezes graves ou recorrentes. A diminuição das plaquetas ocasiona sangramentos, sendo os mais comuns das gengivas e pelo nariz e manchas roxas (equimoses) e/ou pontos roxos (petéquias) na pele. O paciente pode apresentar gânglios linfáticos inchados, mas sem dor, principalmente na região do pescoço e das axilas; febre ou suores noturnos; perda de peso sem motivo aparente; desconforto abdominal (provocado pelo inchaço do baço ou fígado); dores nos ossos e nas articulações. Caso a doença afete o Sistema Nervoso Central (SNC), podem surgir dores de cabeça, náuseas, vômitos, visão dupla e desorientação. Depois de insta', 'A origem desse câncer ainda é desconhecida. O que se sabe é que certos fatores podem aumentar o risco de ele surgir. Entram na lista substâncias químicas, como o benzeno, formadeíldos e agrotóxicos.', 'https://uploads.metropoles.com/wp-content/uploads/2018/08/30194723/39453926_533138863808479_8988841391991816192_n1.jpg'),
(5, 'Hepatite B', 'É uma doença infecciosa que agride o fígado, sendo causada pelo vírus B da hepatite (HBV). O HBV está presente no sangue e secreções, e a hepatite B é também classificada como uma infecção sexualmente transmissível.', 'Os sintomas variam e incluem amarelamento dos olhos, dor abdominal e urina escura. Algumas pessoas, especialmente crianças, não apresentam sintomas. Nos casos crônicos, pode ocorrer insuficiência hepática, câncer ou o surgimento de feridas.', 'Contato íntimo sem camisinha; Fazer a manicure com um alicate contaminado; Compartilhar seringas; Fazer piercings ou tatuagens com material contaminado; Ter feito uma transfusão de sangue antes de 1992; De mãe para filho através do parto normal; Lesão na pele ou acidente com agulhas contaminadas.', 'https://static.mundoeducacao.uol.com.br/mundoeducacao/2019/08/hepatite-a.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `newsname` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `datePublication` date NOT NULL,
  `author` varchar(255) NOT NULL,
  `placeOccurrence` text NOT NULL,
  `newsImage` text NOT NULL,
  `content` text NOT NULL,
  `source` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`id`, `newsname`, `caption`, `datePublication`, `author`, `placeOccurrence`, `newsImage`, `content`, `source`) VALUES
(1, 'Cardiologia em evolução', 'Um mundo com o coração bem cuidado', '2020-10-12', 'Julião', 'Brasília', 'https://vizarbrasil.com.br/wp-content/uploads/2017/12/Screenshot-2017-12-6-shutterstock_504454465-jpg-imagem-JPEG-5056-%C3%97-3584-pixels-Redimensionada-26.png', 'Além de todos os prejuízos diretos que o novo coronavírus representou e representa para a saúde e para a sociedade, ele também foi capaz de promover um efeito paralisante em uma grande parcela da popu: cerca de 14 milhões de pessoas no Brasil negligenciaram tratamentos para doença cardiovascular, se negaram a buscar diagnóstico ou deixaram de lado ações preventivas e curativas. ', 'vozes da minha cabeça'),
(2, 'Neurologia em evolução', 'Um mundo com o coração bem cuidado', '2020-10-12', 'Julião', 'Brasília', 'https://medicina.ucpel.edu.br/wp-content/uploads/2020/05/apacucpel_ucpel_image_328-1024x960.jpeg', 'Médicos canadenses temem estar lidando com uma doença cerebral até então desconhecida em meio a uma série de casos envolvendo perda de memória, alucinações e atrofia muscular. Os casos foram registrados na província de New Brunswick e especialistas dizem que há muito mais perguntas do que respostas, pedindo que o público não entre em pânico.  Por mais de um ano, as autoridades de saúde pública rastrearam 43 casos de suspeita de doença neurológica na província, todos sem causas conhecidas.', 'Veja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `category`, `password`) VALUES
(1, 'Matheus', 'matheus@gmail.com', '1', MD5('123')),
(2, 'Admin', 'admin@gmail.com', '1', MD5('adm'));

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `accident`
--
ALTER TABLE `accident`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accident_name` (`accident_name`);

--
-- Índices para tabela `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clinic_cnpj` (`clinic_cnpj`);

--
-- Índices para tabela `depositions`
--
ALTER TABLE `depositions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `crm` (`crm`),
  ADD UNIQUE KEY `rqe` (`rqe`);

--
-- Índices para tabela `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `illness`
--
ALTER TABLE `illness`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `illness_name` (`illness_name`);

--
-- Índices para tabela `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsname` (`newsname`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `accident`
--
ALTER TABLE `accident`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `depositions`
--
ALTER TABLE `depositions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `illness`
--
ALTER TABLE `illness`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
