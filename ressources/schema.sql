-- ---------------------------------------------------------------------------- --
-- SCHEMA DE LA BASE : TABLE clients					        --
-- ---------------------------------------------------------------------------- --
CREATE TABLE clients (
        ncli     CHAR(10)    NOT NULL,
        nom      CHAR(32)    NOT NULL,
        adresse  CHAR(60)    NOT NULL,
        localite CHAR(30)    NOT NULL,
        cat      CHAR(2),
        compte   DECIMAL(9,2)NOT NULL, 
 PRIMARY KEY (ncli));
