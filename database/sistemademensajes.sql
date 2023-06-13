SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Table structure for table `usuarios y chat`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(12) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `number` varchar(12) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(12) NOT NULL AUTO_INCREMENT,
  `id_emisor` int(12) NOT NULL,
  `id_receptor` int(12) NOT NULL,
  `message` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_chat`),
  FOREIGN KEY (`id_emisor`) REFERENCES `usuarios`(`id_user`),
  FOREIGN KEY (`id_receptor`) REFERENCES `usuarios`(`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;