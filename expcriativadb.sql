CREATE DATABASE IF NOT EXISTS bd_seguranca;

use bd_seguranca;

CREATE TABLE usuarios(
  email VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  telefone VARCHAR(15) NOT NULL,
  verificado ENUM('S','N'),
  ganhos int,
  despesas int
);

INSERT INTO usuarios VAlUES(
  "joaodascouves@gmail.com",
  "123@Puc2022",
  "(99)99999-9999",
  "S",
  "0",
  "0"
);




select * from usuarios;
