CREATE TABLE usuario (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  email VARCHAR(65) NOT NULL,
  telefone VARCHAR(11) NULL,
  status_2 INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_usuario)
);