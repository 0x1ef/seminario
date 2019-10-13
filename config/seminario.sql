/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.36-MariaDB : Database - seminario
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`seminario` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `seminario`;

/*Table structure for table `archivos` */

DROP TABLE IF EXISTS `archivos`;

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `ruta` varchar(200) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `archivos` */

insert  into `archivos`(`id`,`nombre`,`descripcion`,`ruta`,`tipo`,`size`) values (4,'prueba02.txt','prueba con nombre','C:/xampp/htdocs/www/POO/productos/archivo/','text/plain',0),(5,'prueba.cpp','prueba con nombre','C:/xampp/htdocs/www/POO/productos/archivo/','application/octet-st',1175),(6,'prueba.txt','prueba de cargar','C:/xampp/htdocs/www/POO/productos/archivo/','text/plain',8),(7,'prueba.o','prueba de cargar2','C:/xampp/htdocs/www/POO/productos/archivo/','application/octet-st',68831),(8,'prueba.txt','prueba iguales','C:/xampp/htdocs/www/POO/productos/archivo/','text/plain',7);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
