create database udemy CHARACTER SET 'UTF8' COLLATE 'utf8_bin';
use udemy;

CREATE TABLE usuarios (
  email varchar(250) PRIMARY KEY,
  pass varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE cursos (
  idCurso int(11) AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(250) NOT NULL,
  horas int(4) NOT NULL,
  precio float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE matricula (
  idCurso int(11) NOT NULL,
  email varchar(250) NOT NULL,
  fecha date NOT NULL,
  PRIMARY KEY (idCurso,email),
  FOREIGN KEY (idCurso) REFERENCES cursos(idCurso),
  FOREIGN KEY (email) REFERENCES usuarios(email)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO usuarios VALUES ('prueba@prueba.com', 'prueba');
INSERT INTO cursos VALUES (NULL,"MongoDB",60,25.90);
INSERT INTO cursos VALUES (NULL,"Master en Aplicaciones Web",360,100.99);
INSERT INTO cursos VALUES (NULL,"Inteligencia artificial",150,69.99);
INSERT INTO cursos VALUES (NULL,"Big data",550,359.90);
