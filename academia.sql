-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2016 at 10:51 AM
-- Server version: 5.5.52-MariaDB-1ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `academia`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `anio_ingreso` int(11) NOT NULL,
  `semestre_ingreso` int(11) NOT NULL,
  `tipo_ingreso` varchar(20) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_institucion_proc` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `id_carrera` (`id_carrera`),
  KEY `id_persona` (`id_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `id_persona`, `id_carrera`, `anio_ingreso`, `semestre_ingreso`, `tipo_ingreso`, `codigo`, `id_institucion_proc`, `estado`) VALUES
(7, 38, 3, 2013, 2, 'PRE', 20000, 8, 1),
(8, 39, 39, 2014, 1, 'PRE', 20001, 9, 1),
(9, 40, 40, 2012, 2, 'ORDINARIO', 20002, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aulas`
--

CREATE TABLE IF NOT EXISTS `aulas` (
  `id_aula` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `ubicacion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_aula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aulas`
--

INSERT INTO `aulas` (`id_aula`, `nombre`, `codigo`, `ubicacion`, `estado`) VALUES
(1, 'AULA-101', 'AULA-01', 'PRIMER PISO', 1),
(2, 'AULA-105', 'A5', 'PRIMER PISO', 1),
(3, 'AULA-104', 'A4', 'PRIMER PISO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sigla` text NOT NULL,
  `codigo` text NOT NULL,
  `id_facultad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_carrera`),
  KEY `id_facultad` (`id_facultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre`, `sigla`, `codigo`, `id_facultad`, `estado`) VALUES
(1, 'CONTABILIDAD Y FINANZAS CORPORATIVAS', 'CFC', 'CON-FC', 3, 1),
(2, 'ECONOMIA Y NEGOCIOS INTERNACIONALES', 'ENI', 'ECO-NI', 4, 1),
(3, 'INGENIERIA DE SISTEMAS E INFORMATICA', 'FISI', '0989', 1, 1),
(4, 'ENFERMERIA', 'ENFERMERIA', 'ENF-101', 2, 1),
(5, 'ADMINISTRACION', 'ADMINI', 'AD-MAS', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `curriculas`
--

CREATE TABLE IF NOT EXISTS `curriculas` (
  `id_curricula` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `anio` varchar(5) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_curricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `curriculas`
--

INSERT INTO `curriculas` (`id_curricula`, `codigo`, `anio`, `descripcion`, `estado`) VALUES
(1, 'CURRI-50120', '1990', 'CURRICULA ESTABLECIDA BAJO RESOLUCION NUMERO 50120-CONSEJO', 1),
(2, 'CURRI-2016', '2016', 'SEGUNDA CURRICULA CON RESOLUCION 7899', 1);

-- --------------------------------------------------------

--
-- Table structure for table `curricula_cursos`
--

CREATE TABLE IF NOT EXISTS `curricula_cursos` (
  `id_curricula_curso` int(11) NOT NULL AUTO_INCREMENT,
  `id_curricula` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `credito` int(11) NOT NULL,
  `requisito` text NOT NULL,
  `ciclo` int(11) NOT NULL,
  `hora_teoria` int(11) NOT NULL,
  `hora_practica` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_curricula_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `curricula_cursos`
--

INSERT INTO `curricula_cursos` (`id_curricula_curso`, `id_curricula`, `id_curso`, `tipo`, `credito`, `requisito`, `ciclo`, `hora_teoria`, `hora_practica`, `estado`) VALUES
(1, 1, 18, 'ELECTIVO', 4, '', 9, 5, 4, 1),
(2, 1, 28, 'OBLIGATORIO', 4, '', 1, 5, 4, 1),
(3, 1, 1, 'OBLIGATORIO', 4, '', 1, 4, 3, 1),
(4, 1, 27, 'OBLIGATORIO', 5, '', 1, 3, 6, 1),
(5, 1, 26, 'OBLIGATORIO', 5, '', 1, 3, 6, 1),
(6, 2, 18, 'OBLIGATORIO', 5, '', 1, 5, 7, 1),
(7, 1, 25, 'OBLIGATORIO', 5, '', 2, 6, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `codigo` text NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre`, `codigo`, `id_carrera`, `estado`) VALUES
(1, 'ECONOMIA', 'ECO-MS', 2, 1),
(2, 'MATEMATICA I', 'M-I', 3, 1),
(3, 'MATEMATICA II', 'MAT-II', 3, 1),
(4, 'LENGUA Y COMUNICACION I', 'LCI', 4, 1),
(5, 'MATEMATICA BASICA', 'MATB', 4, 1),
(6, 'METODOLOGIA PARA EL TRABAJO UNIVERSITARIO', 'MPTU', 4, 1),
(7, 'INTRODUCCION A LA ENFERMERIA', 'IAE', 4, 1),
(8, 'COMPUTACION I', 'COM-I', 4, 1),
(9, 'ACTIVIDAD', 'ACT', 4, 1),
(10, 'LENGUA Y COMUNICACION II', 'LEN-COM', 4, 1),
(11, 'QUIMICA GENERAL', 'QG', 4, 1),
(12, 'BIOLOGIA', 'BIO', 4, 1),
(13, 'PSICOLOGIA GENERAL', 'PSICOG', 4, 1),
(14, 'ESTADISTICA', 'ESTA', 4, 1),
(15, 'COMPUTACION II', 'COMPII', 4, 1),
(16, 'EPISTEMOLOGIA', 'EPIS', 4, 1),
(17, 'METODOLOGIA DE LA INVESTIGACION', 'MDI', 4, 1),
(18, 'FISICA', 'FISIC', 4, 1),
(19, 'PSICOLOGIA DEL DESARROLLO', 'PSIDES', 4, 1),
(20, 'QUIMICA ORGANICA', 'QO', 4, 1),
(21, 'ANATOMIA Y FISIOLOGIA I', 'ANAFIS', 4, 1),
(22, 'ENFERMERIA EN SALUD COMUNITARIA I', 'ESCI', 4, 1),
(23, 'ANTRPOLOGIA', 'ANTRO', 4, 1),
(24, 'BIOQUIMICA', 'BIOQ', 4, 1),
(25, 'ANATOMIA Y FISIOLOGIA II', 'AFII', 4, 1),
(26, 'PROCESO DE ENFERMERIA', 'PROE', 4, 1),
(27, 'ENFERMERIA CLINICA', 'ECLI', 4, 1),
(28, 'TEOLOGIA MORAL', 'TMORAL', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cursos_carreras`
--

CREATE TABLE IF NOT EXISTS `cursos_carreras` (
  `id_curso_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  PRIMARY KEY (`id_curso_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cursos_matriuclados`
--

CREATE TABLE IF NOT EXISTS `cursos_matriuclados` (
  `id_curso_matriculado` int(11) NOT NULL AUTO_INCREMENT,
  `id_matricula` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_curso_matriculado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `profesion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `anio_inicio` date NOT NULL,
  `grado` text NOT NULL,
  `codigo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_docente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `docentes`
--

INSERT INTO `docentes` (`id_docente`, `id_persona`, `id_carrera`, `profesion`, `anio_inicio`, `grado`, `codigo`, `estado`) VALUES
(2, 17, 3, 'INGENIERO', '2012-01-01', 'TITULADO', 60000, 1),
(4, 22, 3, 'INGENIERO', '2014-01-01', 'TITULADO', 60001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facultades`
--

CREATE TABLE IF NOT EXISTS `facultades` (
  `id_facultad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sigla` text NOT NULL,
  `codigo` text NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_facultad`),
  KEY `id_institucion_ruc` (`id_institucion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `facultades`
--

INSERT INTO `facultades` (`id_facultad`, `nombre`, `sigla`, `codigo`, `id_institucion`, `estado`) VALUES
(1, 'INGENIERIA DE SISTEMAS', 'FISI', 'IS-10', 1, 1),
(2, 'ENFERMERIA', 'ENFERMERIA', 'EN-201', 1, 1),
(3, 'CONTABILIDAD', 'CONTABILIDAD', 'CON-200', 1, 1),
(4, 'ECONOMIA Y NEGOCIOS INTERNACIONALES', 'ECONOMIA', 'ECON-E', 1, 1),
(5, 'ADMINISTRACION', 'ADMINIS', 'ADMIN', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `id_carrera` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `dia` varchar(30) NOT NULL,
  `aula` varchar(5) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `institucion`
--

CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sigla` text NOT NULL,
  `ruc` text NOT NULL,
  `razon_social` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text NOT NULL,
  `representante` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `nombre`, `sigla`, `ruc`, `razon_social`, `direccion`, `telefono`, `representante`, `estado`) VALUES
(1, 'UNIVERSIDAD PRIVADA DE LA SELVA PERUANA', 'UPSEP', '20528336125', 'UNIVERSIDAD PRIVADA DE LA SELVA PERUANA S.A.C', 'San Martin 230', '065-241590', 'FERNANDO PEÃ‘A', 1),
(2, 'UNIVERSIDAD NACIONAL DE LA AMAZONIA PERUANA', 'UNAP', '456555555', 'UNIVERSIDAD NACIONAL DE LA AMAZNIA PERUANA SAC', 'Iquitos - PerÃº', '065-900000', 'cagaco', 0);

-- --------------------------------------------------------

--
-- Table structure for table `institu_procedencias`
--

CREATE TABLE IF NOT EXISTS `institu_procedencias` (
  `id_institu_proc` int(11) NOT NULL AUTO_INCREMENT,
  `entidad` varchar(50) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_institu_proc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `institu_procedencias`
--

INSERT INTO `institu_procedencias` (`id_institu_proc`, `entidad`, `nombre`, `tipo`) VALUES
(8, 'COLEGIO', 'ROSA GUSTINA', 'NACIONAL'),
(9, 'COLEGIO', 'SEÃ‘ORA LORETO', 'PRIVADA'),
(10, 'COLEGIO', 'MANUEL ASUNCION', 'NACIONAL');

-- --------------------------------------------------------

--
-- Table structure for table `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
  `id_matricula` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `periodos`
--

CREATE TABLE IF NOT EXISTS `periodos` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `anio` text NOT NULL,
  `semestre` int(11) NOT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apaterno` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `amaterno` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(70) NOT NULL,
  `numero_documento` text NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` text NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `fnacimiento` date NOT NULL,
  `id_tipo_persona` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `id_tipo_persona` (`id_tipo_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre`, `apaterno`, `amaterno`, `tipo_documento`, `numero_documento`, `direccion`, `telefono`, `correo`, `sexo`, `fnacimiento`, `id_tipo_persona`, `estado`) VALUES
(1, 'Heber', 'Jimenez', 'Mendez', 'DNI', '45805581', 'Calle canadá 132 punchana', '958807029', 'heberjimenezm@gmail.com', 'M', '1990-09-20', 1, 1),
(5, 'GABRIELA', 'MENDOZA', 'PEREZ', 'DNI', '45342333', 'LAS PERAS ALMENDRAS', '0782343', 'gaby@hotmail.com', 'F', '1880-01-27', 5, 1),
(6, 'CINTHIA', 'PINEDO', 'BARTRA', 'DNI', '1232222123', 'BUENOS AIRES 321', '989098909', 'cinthia@gmail.com', 'F', '1880-01-11', 2, 1),
(12, 'MARIO', 'MENDOZA', 'POMA', 'DNI', '3432343', 'DE POR AHI', '4323432', 'mario@gmail.com', 'M', '1232-12-12', 2, 1),
(13, 'MARTIN', 'VASQUEZ', 'PEREYRA', 'DNI', '3443234324', 'SAN ANTONIO 213', '54345', 'martin@gamil.com', 'M', '1899-01-09', 3, 1),
(17, 'MANUEL', 'CURTO', 'BOLANIOS', 'DNI', '1232323', 'LAS AMELIAS', '543454543', 'manuel@gmail.com', 'M', '1980-01-01', 3, 1),
(22, 'TONY', 'BARDALES', 'BARTRA', 'DNI', '34324342', 'AVENIDA 28 DE JULIO 121', '98653373', 'toni@homtmail.com', 'M', '1878-12-09', 3, 1),
(38, 'DANIEL', 'MENDOZA', 'PEREYRA', 'DNI', '465736473', 'FREIRE CON 28 n-234', '975857564', 'daniel@gmail.com', 'M', '1989-02-01', 4, 1),
(39, 'FRANKLIM', 'GUEVARA', 'TUESTA', 'DNI', '46543454', 'AVENIDA LAS FLORES 390', '973737384', 'frankilm@hotmail.com', 'M', '0000-00-00', 4, 1),
(40, 'ROBERT', 'NOLORBE', 'CELIS', 'DNI', '45345434', 'NAUTA 342', '970123321', 'robert@gmail.com', 'M', '1989-09-02', 4, 1),
(41, 'KEYLITA', 'SINTI', 'AGUILAR', 'DNI', '47364533', 'SAN LORENZO 839', '980737373', 'keylita@gmail.com', 'F', '1998-03-20', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_personas`
--

CREATE TABLE IF NOT EXISTS `tipo_personas` (
  `id_tipo_persona` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tipo_personas`
--

INSERT INTO `tipo_personas` (`id_tipo_persona`, `tipo`, `estado`) VALUES
(1, 'SISTEMAS', 1),
(2, 'ADMISION', 1),
(3, 'DOCENTE', 1),
(4, 'ALUMNO', 1),
(5, 'ACADEMICA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_persona` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_persona` (`id_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `id_persona`, `estado`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, 'gmendoza', '765ba753b609d84b3813991fe23f81b3', 5, 1),
(3, 'cpinedo', '5b54de4d7c3647eb012e1dbda93d9cbe', 6, 1),
(9, 'mmendoza', '3d3a8bbcad3d9f91cda207cb0b08f276', 12, 1),
(10, 'mvasquez', '658ca2b8fd58439c88203bdde5657d46', 13, 1),
(14, 'mcurto', 'd7d8e49179754659a25ea7081515766a', 17, 1),
(19, 'tbardales', '5b54de4d7c3647eb012e1dbda93d9cbe', 22, 1),
(35, 'dmendoza', '658ca2b8fd58439c88203bdde5657d46', 38, 1),
(36, 'fguevara', 'cf3f001161b470c25561c0c5999e6243', 39, 1),
(37, 'rnolorbe', '3d8adca1f531600c1bb64d4c09ab9ada', 40, 1),
(38, 'ksinti', '6f5e464b6dbfa186eef77c54bfd4503a', 41, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carreras`
--
ALTER TABLE `carreras`
  ADD CONSTRAINT `carreras_ibfk_1` FOREIGN KEY (`id_facultad`) REFERENCES `facultades` (`id_facultad`);

--
-- Constraints for table `facultades`
--
ALTER TABLE `facultades`
  ADD CONSTRAINT `facultades_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`);

--
-- Constraints for table `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`id_tipo_persona`) REFERENCES `tipo_personas` (`id_tipo_persona`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
