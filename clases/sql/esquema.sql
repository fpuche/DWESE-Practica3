CREATE TABLE IF NOT EXISTS `usuario` (
`login` varchar(30) NOT NULL primary key,
`clave` varchar(40) NOT NULL,
`nombre` varchar(30) NOT NULL,
`apellidos` varchar(60) NOT NULL,
`email` varchar(40) NOT NULL,
`fechaalta` date NOT NULL,
`isactivo` tinyint(1) NOT NULL,
`isroot` tinyint(1) NOT NULL DEFAULT 0,
`rol` enum('administrador', 'usuario') NOT NULL DEFAULT 'usuario',
`fechalogin` datetime
) ENGINE=InnoDB;