
CREATE DATABASE IF NOT EXISTS cont_assist; 

USE cont_assist;

CREATE TABLE IF NOT EXISTS assistencia (
  id            INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome          VARCHAR(255) NOT NULL,
  quantidade    INT DEFAULT 0, 
  ip_cliente    VARCHAR(255) NOT NULL,
  data          DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS dados_zoom (
  id              INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  link            VARCHAR(255) NOT NULL,
  id_zoom         VARCHAR(20) NOT NULL,
  senha           INT NOT NULL,
  update_data     TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS date_time (
  id          INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  data        DATE NOT NULL,
  start_time  TIME DEFAULT NULL,
  end_time    TIME DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS users (
  id              INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  login           VARCHAR(255) NOT NULL, -- Email 
  password        VARCHAR(255) NOT NULL,
  CONSTRAINT unique_login UNIQUE(login) -- O login não pode se repetir ele é unico
);
