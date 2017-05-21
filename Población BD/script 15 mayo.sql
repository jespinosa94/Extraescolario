-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gi_extraescol
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `gi_extraescol` ;

-- -----------------------------------------------------
-- Schema gi_extraescol
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gi_extraescol` DEFAULT CHARACTER SET utf8 ;
USE `gi_extraescol` ;

-- -----------------------------------------------------
-- Table `gi_extraescol`.`PROVINCIA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`PROVINCIA` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`PROVINCIA` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`cod`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`LOCALIDAD`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`LOCALIDAD` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`LOCALIDAD` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `codigoPostal` VARCHAR(5) CHARACTER SET 'utf8' NOT NULL,
  `rProvincia` INT(11) NOT NULL,
  PRIMARY KEY (`cod`),
  INDEX `fk_rProvincia` (`rProvincia` ASC),
  CONSTRAINT `fk_rProvincia`
    FOREIGN KEY (`rProvincia`)
    REFERENCES `gi_extraescol`.`PROVINCIA` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`USR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`USR` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`USR` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `nick` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `email` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `contrasenya` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `telefono` DOUBLE(9,0) NULL DEFAULT NULL,
  `foto` VARCHAR(50) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `rLocalidad` INT(11) NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE INDEX `uniquenick` (`nick` ASC),
  INDEX `fk_rUsr_Localidad` (`rLocalidad` ASC),
  CONSTRAINT `fk_rUsr_Localidad`
    FOREIGN KEY (`rLocalidad`)
    REFERENCES `gi_extraescol`.`LOCALIDAD` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`OFR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`OFR` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`OFR` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `empresa` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `nif` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `verificado` TINYINT(1) NOT NULL DEFAULT '0',
  `direccion` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`cod`),
  CONSTRAINT `fk_rOfr_Usr`
    FOREIGN KEY (`cod`)
    REFERENCES `gi_extraescol`.`USR` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`ACTIVIDAD`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`ACTIVIDAD` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`ACTIVIDAD` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `fechaPublicacion` DATETIME NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NOT NULL,
  `foto` BLOB NULL DEFAULT NULL,
  `descripcion` TEXT CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `valoracionMedia` FLOAT NOT NULL,
  `verificada` TINYINT(1) NOT NULL DEFAULT '0',
  `precio` FLOAT NOT NULL,
  `metodoPago` SET('Contado', 'Transferencia', 'Tarjeta', 'PayPal') NOT NULL,
  `formaPago` SET('mensual', 'anual', 'trimestral') NOT NULL,
  `activa` TINYINT(1) NOT NULL DEFAULT '1',
  `direccion` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `rOfr` INT(11) NOT NULL,
  `rLocalidad` INT(11) NOT NULL,
  `rangoEdad` SET('4-7 años', '8-12 años', '13-17 años', '+18 años', 'todos los publicos') NOT NULL,
  PRIMARY KEY (`cod`),
  INDEX `fk_rOfrActividad_Ofr` (`rOfr` ASC),
  INDEX `fk_rLocalidadActividad_Localidad` (`rLocalidad` ASC),
  CONSTRAINT `fk_rLocalidadActividad_Localidad`
    FOREIGN KEY (`rLocalidad`)
    REFERENCES `gi_extraescol`.`LOCALIDAD` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rOfrActividad_Ofr`
    FOREIGN KEY (`rOfr`)
    REFERENCES `gi_extraescol`.`OFR` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`ADM`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`ADM` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`ADM` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `apellidos` VARCHAR(300) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`cod`),
  CONSTRAINT `fk_rAdm_Usr`
    FOREIGN KEY (`cod`)
    REFERENCES `gi_extraescol`.`USR` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`BUS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`BUS` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`BUS` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `apellidos` VARCHAR(300) CHARACTER SET 'utf8' NOT NULL,
  `sexo` ENUM('Hombre', 'Mujer') CHARACTER SET 'utf8' NOT NULL,
  `direccion` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  PRIMARY KEY (`cod`),
  CONSTRAINT `fk_rBus_Usr`
    FOREIGN KEY (`cod`)
    REFERENCES `gi_extraescol`.`USR` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`CATEGORIA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`CATEGORIA` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`CATEGORIA` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`cod`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`DIAS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`DIAS` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`DIAS` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `diaSemana` ENUM('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo') CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE INDEX `noDiasRepetidos` (`diaSemana` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`FRANJA_HORARIA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`FRANJA_HORARIA` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`FRANJA_HORARIA` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `horaInicio` TIME NOT NULL,
  `horaFin` TIME NOT NULL,
  PRIMARY KEY (`cod`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`TURNO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`TURNO` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`TURNO` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `rActividad` INT(11) NOT NULL,
  PRIMARY KEY (`cod`),
  INDEX `fk_rTurno_Actividad` (`rActividad` ASC),
  CONSTRAINT `fk_rTurno_Actividad`
    FOREIGN KEY (`rActividad`)
    REFERENCES `gi_extraescol`.`ACTIVIDAD` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`HORARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`HORARIO` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`HORARIO` (
  `rDias` INT(11) NOT NULL DEFAULT '0',
  `rTurno` INT(11) NOT NULL DEFAULT '0',
  `rFranjaHoraria` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rDias`, `rTurno`, `rFranjaHoraria`),
  INDEX `fk_rHorario_Turno` (`rTurno` ASC),
  INDEX `fk_rHorario_FranjaHoraria` (`rFranjaHoraria` ASC),
  CONSTRAINT `fk_rHorario_Dias`
    FOREIGN KEY (`rDias`)
    REFERENCES `gi_extraescol`.`DIAS` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rHorario_FranjaHoraria`
    FOREIGN KEY (`rFranjaHoraria`)
    REFERENCES `gi_extraescol`.`FRANJA_HORARIA` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rHorario_Turno`
    FOREIGN KEY (`rTurno`)
    REFERENCES `gi_extraescol`.`TURNO` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`NEWSLETTER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`NEWSLETTER` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`NEWSLETTER` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `descripcion` TEXT CHARACTER SET 'utf8' NOT NULL,
  `promocional` TINYINT(1) NOT NULL,
  `notificacion` TINYINT(1) NOT NULL,
  `rActividad` INT(11) NOT NULL,
  PRIMARY KEY (`cod`),
  INDEX `fk_rNewsletter_Actividad` (`rActividad` ASC),
  CONSTRAINT `fk_rNewsletter_Actividad`
    FOREIGN KEY (`rActividad`)
    REFERENCES `gi_extraescol`.`ACTIVIDAD` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`INTERESARSE_POR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`INTERESARSE_POR` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`INTERESARSE_POR` (
  `rBus` INT(11) NOT NULL DEFAULT '0',
  `rNewsletter` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rBus`, `rNewsletter`),
  INDEX `fk_rInteresarsePor_Newsletter` (`rNewsletter` ASC),
  CONSTRAINT `fk_rInteresarsePor_Bus`
    FOREIGN KEY (`rBus`)
    REFERENCES `gi_extraescol`.`BUS` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rInteresarsePor_Newsletter`
    FOREIGN KEY (`rNewsletter`)
    REFERENCES `gi_extraescol`.`NEWSLETTER` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`SE_INSCRIBE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`SE_INSCRIBE` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`SE_INSCRIBE` (
  `rBus` INT(11) NOT NULL DEFAULT '0',
  `rActividad` INT(11) NOT NULL DEFAULT '0',
  `fechaInscripcion` DATE NOT NULL,
  `fechaFin` DATE NOT NULL,
  `activa` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rBus`, `rActividad`),
  INDEX `fk_rSI_Actividad` (`rActividad` ASC),
  CONSTRAINT `fk_rSI_Actividad`
    FOREIGN KEY (`rActividad`)
    REFERENCES `gi_extraescol`.`ACTIVIDAD` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rSI_Bus`
    FOREIGN KEY (`rBus`)
    REFERENCES `gi_extraescol`.`BUS` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`SEGUIR_INSCRIPCION`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`SEGUIR_INSCRIPCION` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`SEGUIR_INSCRIPCION` (
  `rSeInscribea` INT(11) NOT NULL DEFAULT '0',
  `rSeInscribeb` INT(11) NOT NULL DEFAULT '0',
  `rNewsletter` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rSeInscribea`, `rSeInscribeb`, `rNewsletter`),
  INDEX `fk_rSeguirInscripcion_Newsletter` (`rNewsletter` ASC),
  CONSTRAINT `fk_rSeguirInscripcion_Newsletter`
    FOREIGN KEY (`rNewsletter`)
    REFERENCES `gi_extraescol`.`NEWSLETTER` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rSeguirInscripcion_SeInscribe`
    FOREIGN KEY (`rSeInscribea` , `rSeInscribeb`)
    REFERENCES `gi_extraescol`.`SE_INSCRIBE` (`rActividad` , `rBus`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`TAG`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`TAG` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`TAG` (
  `cod` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `rCategoria` INT(11) NOT NULL,
  PRIMARY KEY (`cod`),
  INDEX `fk_tag_Categoria` (`rCategoria` ASC),
  CONSTRAINT `fk_tag_Categoria`
    FOREIGN KEY (`rCategoria`)
    REFERENCES `gi_extraescol`.`CATEGORIA` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`SE_DEFINE_CON`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`SE_DEFINE_CON` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`SE_DEFINE_CON` (
  `rActividad` INT(11) NOT NULL DEFAULT '0',
  `rTag` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rActividad`, `rTag`),
  INDEX `fk_rSeDefineCon_Tag` (`rTag` ASC),
  CONSTRAINT `fk_rSeDefineCon_Actividad`
    FOREIGN KEY (`rActividad`)
    REFERENCES `gi_extraescol`.`ACTIVIDAD` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rSeDefineCon_Tag`
    FOREIGN KEY (`rTag`)
    REFERENCES `gi_extraescol`.`TAG` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`SE_INSCRIBE_TURNO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`SE_INSCRIBE_TURNO` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`SE_INSCRIBE_TURNO` (
  `rSeInscribea` INT(11) NOT NULL DEFAULT '0',
  `rSeInscribeb` INT(11) NOT NULL DEFAULT '0',
  `rTurno` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rSeInscribea`, `rSeInscribeb`, `rTurno`),
  INDEX `fk_rSeInscribeTurno_Turno` (`rTurno` ASC),
  CONSTRAINT `fk_rSeInscribeTurno_SeInscribe`
    FOREIGN KEY (`rSeInscribea` , `rSeInscribeb`)
    REFERENCES `gi_extraescol`.`SE_INSCRIBE` (`rActividad` , `rBus`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rSeInscribeTurno_Turno`
    FOREIGN KEY (`rTurno`)
    REFERENCES `gi_extraescol`.`TURNO` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`SUS_AFICIONES_ESP_SON`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`SUS_AFICIONES_ESP_SON` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`SUS_AFICIONES_ESP_SON` (
  `rBus` INT(11) NOT NULL DEFAULT '0',
  `rTag` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rBus`, `rTag`),
  INDEX `fk_rSusAficionesEspSon_Categoria` (`rTag` ASC),
  CONSTRAINT `fk_rSusAficionesEspSon_Bus`
    FOREIGN KEY (`rBus`)
    REFERENCES `gi_extraescol`.`BUS` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rSusAficionesEspSon_Categoria`
    FOREIGN KEY (`rTag`)
    REFERENCES `gi_extraescol`.`TAG` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`SUS_AFICIONES_GEN_SON`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`SUS_AFICIONES_GEN_SON` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`SUS_AFICIONES_GEN_SON` (
  `rBus` INT(11) NOT NULL DEFAULT '0',
  `rCategoria` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rBus`, `rCategoria`),
  INDEX `fk_rSusAficionesGenSon_Categoria` (`rCategoria` ASC),
  CONSTRAINT `fk_rSusAficionesGenSon_Bus`
    FOREIGN KEY (`rBus`)
    REFERENCES `gi_extraescol`.`BUS` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rSusAficionesGenSon_Categoria`
    FOREIGN KEY (`rCategoria`)
    REFERENCES `gi_extraescol`.`CATEGORIA` (`cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `gi_extraescol`.`VALORACION`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gi_extraescol`.`VALORACION` ;

CREATE TABLE IF NOT EXISTS `gi_extraescol`.`VALORACION` (
  `rActividad` INT(11) NOT NULL DEFAULT '0',
  `rBus` INT(11) NOT NULL DEFAULT '0',
  `valoracion` FLOAT NOT NULL,
  `titulo` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `fecha` DATETIME NOT NULL,
  `descripcion` TEXT CHARACTER SET 'utf8' NULL DEFAULT NULL,
  PRIMARY KEY (`rActividad`, `rBus`),
  INDEX `fk_rHorario_SeInscribe` (`rBus` ASC),
  CONSTRAINT `fk_rHorario_SeInscribe`
    FOREIGN KEY (`rBus`)
    REFERENCES `gi_extraescol`.`SE_INSCRIBE` (`rBus`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rValoracion_SeInscribe`
    FOREIGN KEY (`rActividad`)
    REFERENCES `gi_extraescol`.`SE_INSCRIBE` (`rActividad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

USE `gi_extraescol` ;

-- -----------------------------------------------------
-- procedure datosUSR
-- -----------------------------------------------------

USE `gi_extraescol`;
DROP procedure IF EXISTS `gi_extraescol`.`datosUSR`;

DELIMITER $$
USE `gi_extraescol`$$
CREATE DEFINER=`gi_hrbq1`@`%` PROCEDURE `datosUSR`()
BEGIN



SELECT * FROM USR;



END$$

DELIMITER ;

-- -----------------------------------------------------
-- function extraerCodLocalidad
-- -----------------------------------------------------

USE `gi_extraescol`;
DROP function IF EXISTS `gi_extraescol`.`extraerCodLocalidad`;

DELIMITER $$
USE `gi_extraescol`$$
CREATE DEFINER=`gi_hrbq1`@`%` FUNCTION `extraerCodLocalidad`(nLocalidad varchar(50)) RETURNS int(11)
BEGIN

DECLARE resultado int;

SET resultado := (SELECT cod FROM LOCALIDAD WHERE nombre = nLocalidad);

RETURN resultado;

END$$

DELIMITER ;

-- -----------------------------------------------------
-- function extraerCodProvincia
-- -----------------------------------------------------

USE `gi_extraescol`;
DROP function IF EXISTS `gi_extraescol`.`extraerCodProvincia`;

DELIMITER $$
USE `gi_extraescol`$$
CREATE DEFINER=`gi_hrbq1`@`%` FUNCTION `extraerCodProvincia`(nProvincia varchar(50)) RETURNS int(11)
BEGIN

DECLARE resultado int;

SET resultado := (SELECT cod FROM PROVINCIA WHERE nombre = nProvincia);

RETURN resultado;

END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insertarBUS
-- -----------------------------------------------------

USE `gi_extraescol`;
DROP procedure IF EXISTS `gi_extraescol`.`insertarBUS`;

DELIMITER $$
USE `gi_extraescol`$$
CREATE DEFINER=`gi_hrbq1`@`%` PROCEDURE `insertarBUS`(

	IN `nick` varchar(50),

	IN `email` varchar(100),

	IN `contrasenya` varchar (50),

	IN `telefono` double(9,0),

	IN `foto` varchar(50),

	IN `cLocalidad` INT,

	IN `nombre` varchar (100) ,

	IN `apellidos` varchar(300),

	IN `sexo` enum ('Hombre','Mujer'),

	IN `direccion` varchar(100),

	IN `fechaNacimiento` date

)
BEGIN



DECLARE codUsr int;

-- DECLARE error varchar(300);



START TRANSACTION;



    TRY: BEGIN 



        SET codUsr := (SELECT insertarUSR(nick, email, contrasenya, telefono, foto, cLocalidad));



        INSERT INTO BUS VALUES (codUsr, nombre, apellidos, sexo, direccion,fechaNacimiento);



        SELECT 'INSERTION DONE !';



        COMMIT;



    END TRY; 



    CATCH: BEGIN 



        SELECT 'ERROR en la inserción de un BUS';

        -- SET error :=  'Error: ' +  ERROR_MESSAGE() + 'En la linea ' + CONVERT(NVARCHAR(255), ERROR_LINE() ) + '.';



        ROLLBACK;



    END CATCH;





END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insertarOFR
-- -----------------------------------------------------

USE `gi_extraescol`;
DROP procedure IF EXISTS `gi_extraescol`.`insertarOFR`;

DELIMITER $$
USE `gi_extraescol`$$
CREATE DEFINER=`gi_hrbq1`@`%` PROCEDURE `insertarOFR`(

	IN `nick` varchar(50),

	IN `email` varchar(100),

	IN `contrasenya` varchar (50),

	IN `telefono` double(9,0),

	IN `foto` varchar(50),

	IN `cLocalidad` INT,

	IN `nombreEmpresa` varchar (100) ,

	IN `cif` varchar(300),

	IN `direccionEmpresa` varchar(100)

	

)
BEGIN



DECLARE codUsr int;

-- DECLARE error varchar(300);



START TRANSACTION;



    TRY: BEGIN 



        SET codUsr := (SELECT insertarUSR(nick, email, contrasenya, telefono, foto, cLocalidad));



        INSERT INTO OFR (cod,empresa,nif,direccion) VALUES (codUsr, nombreEmpresa, cif, direccionEmpresa);



        SELECT 'INSERTION DONE !';



        COMMIT;



    END TRY; 



    CATCH: BEGIN 



        SELECT 'ERROR en la inserción del OFR';

        -- SET error :=  'Error: ' +  ERROR_MESSAGE() + 'En la linea ' + CONVERT(NVARCHAR(255), ERROR_LINE() ) + '.';



        ROLLBACK;



    END CATCH;





END$$

DELIMITER ;

-- -----------------------------------------------------
-- function insertarUSR
-- -----------------------------------------------------

USE `gi_extraescol`;
DROP function IF EXISTS `gi_extraescol`.`insertarUSR`;

DELIMITER $$
USE `gi_extraescol`$$
CREATE DEFINER=`gi_hrbq1`@`%` FUNCTION `insertarUSR`(

	`nick` varchar(50),

	`email` varchar(100),

	`contrasenya` varchar (50),

	`telefono` double(9,0),

	`foto` varchar(50),

	`cLocalidad` INT



) RETURNS int(11)
BEGIN

 





DECLARE resultado int;







INSERT INTO USR (nick,email,contrasenya,telefono,foto,rLocalidad) VALUES (nick,email,contrasenya,telefono,foto,cLocalidad);



SET resultado := (SELECT cod FROM USR as u WHERE u.nick = nick);



RETURN resultado;

 

END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure obtenInscripcionesFin
-- -----------------------------------------------------

USE `gi_extraescol`;
DROP procedure IF EXISTS `gi_extraescol`.`obtenInscripcionesFin`;

DELIMITER $$
USE `gi_extraescol`$$
CREATE DEFINER=`gi_hrbq1`@`%` PROCEDURE `obtenInscripcionesFin`()
BEGIN



SELECT BUS.nombre, BUS.cod, ACTIVIDAD.nombre, ACTIVIDAD.cod FROM BUS INNER JOIN SE_INSCRIBE ON BUS.cod = SE_INSCRIBE.rBus INNER JOIN ACTIVIDAD ON ACTIVIDAD.cod = SE_INSCRIBE.rActividad LEFT JOIN VALORACION ON SE_INSCRIBE.rActividad = VALORACION.rActividad AND SE_INSCRIBE.rBus = VALORACION.rBus where VALORACION.rActividad is null and VALORACION.rBus is null and (CURDATE()>ACTIVIDAD.fechaFin);



END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure obtenTiempoInscritoSuperiorA
-- -----------------------------------------------------

USE `gi_extraescol`;
DROP procedure IF EXISTS `gi_extraescol`.`obtenTiempoInscritoSuperiorA`;

DELIMITER $$
USE `gi_extraescol`$$
CREATE DEFINER=`gi_hrbq1`@`%` PROCEDURE `obtenTiempoInscritoSuperiorA`(tiempo int)
BEGIN



SELECT BUS.nombre, BUS.cod, ACTIVIDAD.nombre, ACTIVIDAD.cod  FROM BUS INNER JOIN  SE_INSCRIBE ON  BUS.cod = SE_INSCRIBE.rBus INNER JOIN ACTIVIDAD ON ACTIVIDAD.cod = SE_INSCRIBE.rActividad LEFT JOIN  VALORACION ON   SE_INSCRIBE.rActividad =VALORACION.rActividad AND  SE_INSCRIBE.rBus = VALORACION.rBus where VALORACION.rActividad is null and VALORACION.rBus is null and ((DATEDIFF(CURDATE(), SE_INSCRIBE.fechaInscripcion))>= tiempo);





END$$

DELIMITER ;
USE `gi_extraescol`;

DELIMITER $$

USE `gi_extraescol`$$
DROP TRIGGER IF EXISTS `gi_extraescol`.`asignarFechaInscripcion` $$
USE `gi_extraescol`$$
CREATE
DEFINER=`gi_arr62`@`%`
TRIGGER `gi_extraescol`.`asignarFechaInscripcion`
BEFORE INSERT ON `gi_extraescol`.`SE_INSCRIBE`
FOR EACH ROW
BEGIN



SET NEW.fechaInscripcion := CURDATE();

SET NEW.activa := 1;



END$$


USE `gi_extraescol`$$
DROP TRIGGER IF EXISTS `gi_extraescol`.`actualizarValoracionMediaIns` $$
USE `gi_extraescol`$$
CREATE
DEFINER=`gi_hrbq1`@`%`
TRIGGER `gi_extraescol`.`actualizarValoracionMediaIns`
AFTER INSERT ON `gi_extraescol`.`VALORACION`
FOR EACH ROW
BEGIN

DECLARE resultado float(4);

SET resultado := (SELECT sum(valoracion)/count(valoracion) from VALORACION where rActividad = NEW.rActividad);

UPDATE ACTIVIDAD SET valoracionMedia = resultado where ACTIVIDAD.cod=NEW.rActividad;

END$$


USE `gi_extraescol`$$
DROP TRIGGER IF EXISTS `gi_extraescol`.`actualizarValoracionMediaUp` $$
USE `gi_extraescol`$$
CREATE
DEFINER=`gi_hrbq1`@`%`
TRIGGER `gi_extraescol`.`actualizarValoracionMediaUp`
AFTER UPDATE ON `gi_extraescol`.`VALORACION`
FOR EACH ROW
BEGIN

DECLARE resultado float(4);

SET resultado := (SELECT sum(valoracion)/count(valoracion) from VALORACION where rActividad = NEW.rActividad);

UPDATE ACTIVIDAD SET valoracionMedia = resultado where ACTIVIDAD.cod=NEW.rActividad;

END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
