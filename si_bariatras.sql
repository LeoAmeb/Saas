-- MySQL Script generated by MySQL Workbench
-- mié 11 mar 2020 17:01:22 CST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema si_bariatras
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema si_bariatras
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `si_bariatras` ;
USE `si_bariatras` ;

-- -----------------------------------------------------
-- Table `si_bariatras`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_bariatras`.`administrador` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido_paterno` VARCHAR(45) NULL DEFAULT NULL,
  `apellido_materno` VARCHAR(45) NULL DEFAULT NULL,
  `usuario` VARCHAR(45) NULL DEFAULT NULL,
  `contrasena` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `si_bariatras`.`actividad_deportiva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_bariatras`.`actividad_deportiva` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `si_bariatras`.`historial_clinico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_bariatras`.`historial_clinico` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `fecha` DATE NULL DEFAULT NULL,
  `motivo_consulta` VARCHAR(45) NULL DEFAULT NULL,
  `terapia_previa` VARCHAR(45) NULL DEFAULT NULL,
  `cirujias_realizadas` VARCHAR(45) NULL DEFAULT NULL,
  `alergias` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `si_bariatras`.`medidas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_bariatras`.`medidas` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `estatura` FLOAT(5,2) NULL DEFAULT NULL,
  `peso` FLOAT(5,2) NULL DEFAULT NULL,
  `facAct` INT NULL DEFAULT NULL,
  `grasa_total` FLOAT(6,2) NULL DEFAULT NULL,
  `grasaSup` FLOAT(6,2) NULL DEFAULT NULL,
  `grasaInf` FLOAT(6,2) NULL DEFAULT NULL,
  `grasaVis` FLOAT(6,2) NULL DEFAULT NULL,
  `masalGrasa` FLOAT(6,2) NULL DEFAULT NULL,
  `masaMusc` FLOAT(6,2) NULL DEFAULT NULL,
  `pesOseo` FLOAT(6,2) NULL DEFAULT NULL,
  `aguaCorp` FLOAT(6,2) NULL DEFAULT NULL,
  `edadMeta` INT NULL DEFAULT NULL,
  `subescapular` FLOAT(6,2) NULL DEFAULT NULL,
  `triceps` FLOAT(6,2) NULL DEFAULT NULL,
  `biceps` FLOAT(6,2) NULL DEFAULT NULL,
  `ileocrestal` FLOAT(6,2) NULL DEFAULT NULL,
  `suprailiaco` FLOAT(6,2) NULL DEFAULT NULL,
  `abdominal` FLOAT(6,2) NULL DEFAULT NULL,
  `musloFron` FLOAT(6,2) NULL DEFAULT NULL,
  `pantorillaMed` FLOAT(6,2) NULL DEFAULT NULL,
  `axilarMed` FLOAT(6,2) NULL DEFAULT NULL,
  `pectoral` FLOAT(6,2) NULL DEFAULT NULL,
  `cefalico` FLOAT(6,2) NULL DEFAULT NULL,
  `cuello` FLOAT(6,2) NULL DEFAULT NULL,
  `mitadBrazoRel` FLOAT(6,2) NULL DEFAULT NULL,
  `mitadBrazoCon` FLOAT(6,2) NULL DEFAULT NULL,
  `antebrazo` FLOAT(6,2) NULL DEFAULT NULL,
  `muneca` FLOAT(6,2) NULL DEFAULT NULL,
  `mesoesternal` FLOAT(6,2) NULL DEFAULT NULL,
  `umbilical` FLOAT(6,2) NULL DEFAULT NULL,
  `cintura` FLOAT(6,2) NULL DEFAULT NULL,
  `cadera` FLOAT(6,2) NULL DEFAULT NULL,
  `muslocm` FLOAT(6,2) NULL DEFAULT NULL,
  `musloMed` FLOAT(6,2) NULL DEFAULT NULL,
  `pantorrilla` FLOAT(6,2) NULL DEFAULT NULL,
  `tobillo` FLOAT(6,2) NULL DEFAULT NULL,
  `biacromial` FLOAT(6,2) NULL DEFAULT NULL,
  `biileoCres` FLOAT(6,2) NULL DEFAULT NULL,
  `longitudPie` FLOAT(6,2) NULL DEFAULT NULL,
  `trasnvTorax` FLOAT(6,2) NULL DEFAULT NULL,
  `anteroPosT` FLOAT(6,2) NULL DEFAULT NULL,
  `biepicondilio` FLOAT(6,2) NULL DEFAULT NULL,
  `biestiliodeo` FLOAT(6,2) NULL DEFAULT NULL,
  `bicondileo` FLOAT(6,2) NULL DEFAULT NULL,
  `bimaleolar` FLOAT(6,2) NULL DEFAULT NULL,
  `transvPie` FLOAT(6,2) NULL DEFAULT NULL,
  `transvMano` FLOAT(6,2) NULL DEFAULT NULL,
  `longMano` FLOAT(6,2) NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `si_bariatras`.`alimentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_bariatras`.`alimentos` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(65) NULL DEFAULT NULL,
  `agua` FLOAT(6,2) NULL DEFAULT NULL,
  `azucar` FLOAT(6,2) NULL DEFAULT NULL,
  `hdec` FLOAT(6,2) NULL DEFAULT NULL,
  `lipidos` FLOAT(6,2) NULL DEFAULT NULL,
  `proteina` FLOAT(6,2) NULL DEFAULT NULL,
  `fibra` FLOAT(6,2) NULL DEFAULT NULL,
  `calcio` FLOAT(6,2) NULL DEFAULT NULL,
  `hierro` FLOAT(6,2) NULL DEFAULT NULL,
  `magnesio` FLOAT(6,2) NULL DEFAULT NULL,
  `fosforo` FLOAT(6,2) NULL DEFAULT NULL,
  `potasio` FLOAT(6,2) NULL DEFAULT NULL,
  `sodio` FLOAT(6,2) NULL DEFAULT NULL,
  `cobre` FLOAT(6,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `si_bariatras`.`dietas_dia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_bariatras`.`dietas_dia` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `tiempo` VARCHAR(45) NULL DEFAULT NULL,
  `calorias` FLOAT(6,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `si_bariatras`.`dietas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_bariatras`.`dietas` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `total_calorias` INT NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `si_bariatras`.`gasto_energetico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_bariatras`.`gasto_energetico` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `autor` VARCHAR(45) NULL DEFAULT NULL,
  `basal` INT NULL DEFAULT NULL,
  `eta` INT NULL DEFAULT NULL,
  `af` INT NULL DEFAULT NULL,
  `total` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `si_bariatras`.`estilo_vida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_bariatras`.`estilo_vida` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `actividad_laboral` VARCHAR(85) NULL DEFAULT NULL,
  `descripcion_laboral` VARCHAR(45) NULL DEFAULT NULL,
  `nivel_estres` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `si_bariatras`.`pacientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_bariatras`.`pacientes` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido_paterno` VARCHAR(45) NULL DEFAULT NULL,
  `apellido_materno` VARCHAR(45) NULL DEFAULT NULL,
  `edad` INT NULL DEFAULT NULL,
  `correo` VARCHAR(45) NULL DEFAULT NULL,
  `dni` VARCHAR(45) NULL DEFAULT NULL,
  `sangre` VARCHAR(40) NULL DEFAULT NULL,
  `escolaridad` VARCHAR(45) NULL DEFAULT NULL,
  `genero` VARCHAR(45) NULL DEFAULT NULL,
  `fecha_nacimiento` DATE NULL DEFAULT NULL,
  `direccion` VARCHAR(55) NULL DEFAULT NULL,
  `ciudad` VARCHAR(45) NULL DEFAULT NULL,
  `estado` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` VARCHAR(45) NULL DEFAULT NULL,
  `whatsapp` VARCHAR(45) NULL DEFAULT NULL,
  `peso` FLOAT(5,2) NULL DEFAULT NULL,
  `estatura` FLOAT(3,2) NULL DEFAULT NULL,
  `imc` FLOAT(8,2) NULL DEFAULT NULL,
  `biompedancia` FLOAT(4,2) NULL DEFAULT NULL,
  `frecuencia_cigarro` VARCHAR(40) NULL DEFAULT NULL,
  `cantidad_cigarro` INT NULL DEFAULT NULL,
  `frecuencia_alcohol` VARCHAR(40) NULL DEFAULT NULL,
  `cantidad_alcohol` INT NULL DEFAULT NULL,
  `frecuencia_drogas` VARCHAR(40) NULL DEFAULT NULL,
  `cantidad_drogas` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
