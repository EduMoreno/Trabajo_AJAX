--
-- Base de datos: zoo
--

CREATE DATABASE  IF NOT EXISTS zoo  charset=utf8;
USE zoo;

CREATE TABLE animal (
  idanimal int(11) NOT NULL,
  fecha  date NOT NULL,
  genero varchar(150) NOT NULL,
  edad int(11) NOT NULL,
  provincia varchar(30)  NOT NULL,
  idtipo int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO animal (idanimal, fecha, genero, edad, provincia, idtipo) VALUES
(1, '2017-01-04', 'Macho', 2 , 'Almeria', 1),
(2, '2017-01-03', 'Hembra', 5 , 'Malaga', 3);


CREATE TABLE tipo (
  idtipo int(11) NOT NULL,
  nombre varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tipo (idtipo, nombre) VALUES
(1, 'Gorila'),
(2, 'Tigre'),
(3, 'Leon'),
(4, 'Serpiente');


ALTER TABLE animal
  ADD PRIMARY KEY (idanimal),
  ADD KEY idtipo (idtipo);

ALTER TABLE tipo
  ADD PRIMARY KEY (idtipo);

ALTER TABLE animal
  MODIFY idanimal int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS USUARIOS (
  COD_USUARIO CHAR(5) NOT NULL,
  NOMBRE CHAR(50) NOT NULL,
  CLAVE CHAR(20) NOT NULL,
  PRIMARY KEY (COD_USUARIO)
) ENGINE=InnoDB charset=utf8;


INSERT INTO USUARIOS (COD_USUARIO, NOMBRE, CLAVE) VALUES
('001', 'Administrador', 'admin'),
('002', 'Jesus', 'jesus'),
('003', 'Antonio', 'antonio'),
('004', 'Miriam', 'miriam'),
('005', 'Jennifer', 'jennifer');


