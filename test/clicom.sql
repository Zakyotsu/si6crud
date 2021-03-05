-- ---------------------------------------------------------------------------- --
-- Création de la base de données clicom et chargement des données initiales --
-- ---------------------------------------------------------------------------- --
DROP DATABASE IF EXISTS clicom;
CREATE DATABASE clicom;
USE clicom;

CREATE TABLE clients (
        ncli     CHAR(10)    NOT NULL,
        nom      CHAR(32)    NOT NULL,
        adresse  CHAR(60)    NOT NULL,
        localite CHAR(30)    NOT NULL,
        cat      CHAR(2),
        compte   DECIMAL(9,2)NOT NULL, 
 PRIMARY KEY (ncli));

CREATE TABLE produit (
        npro     CHAR(15)    NOT NULL,
        libelle  CHAR(60)    NOT NULL,
        prix     DECIMAL(6)  NOT NULL,
        qstock   DECIMAL(8)  NOT NULL,
PRIMARY KEY (npro));

CREATE TABLE commande (
        ncom     CHAR(12)    NOT NULL,
        ncli     CHAR(10)    NOT NULL,
        DATEcom  DATE        NOT NULL,
PRIMARY KEY (ncom),
FOREIGN KEY (ncli) REFERENCES clients(ncli));

CREATE TABLE detail (
        ncom     CHAR(12)    NOT NULL,
        npro     CHAR(15)    NOT NULL,
        qcom     DECIMAL(8)  NOT NULL, 
PRIMARY KEY (ncom,npro),
FOREIGN KEY (ncom) REFERENCES commande(ncom),
FOREIGN KEY (npro) REFERENCES produit(npro));


INSERT INTO clients VALUES
    ('B112','HANSENNE','23, r. Dumont','Poitiers','C1',1250);
INSERT INTO clients VALUES
    ('C123','MERCIER','25, r. Lemaître','Namur','C1',-2300);
INSERT INTO clients VALUES
    ('B332','MONTI','112, r. Neuve','Genève','B2',0);
INSERT INTO clients VALUES
    ('F010','TOUSSAINT','5, r. Godefroid','Poitiers','C1',0);
INSERT INTO clients VALUES
    ('K111','VANBIST','180, r. Florimont','Lille','B1',720);
INSERT INTO clients VALUES
    ('S127','VANDERKA','3, av. des Roses','Namur','C1',-4580);
INSERT INTO clients VALUES
    ('B512','GILLET','14, r. de l''Eté','Toulouse','B1',-8700);
INSERT INTO clients VALUES
    ('B062','GOFFIN','72, r. de la Gare','Namur','B2',-3200);
INSERT INTO clients VALUES
    ('C400','FERARD','65, r. du Tertre','Poitiers','B2',350);
INSERT INTO clients VALUES
    ('C003','AVRON','8, ch. de la Cure','Toulouse','B1',-1700);
INSERT INTO clients VALUES
    ('K729','NEUMAN','40, r. Bransart','Toulouse',null,0);
INSERT INTO clients VALUES
    ('F011','PONCELET','17, Clôs des Erables','Toulouse','B2',0);
INSERT INTO clients VALUES
    ('L422','FRANCK','60, r. de Wépion','Namur','C1',0);
INSERT INTO clients VALUES
    ('S712','GUILLAUME','14a, ch. des Roses','Paris','B1',0);
INSERT INTO clients VALUES
    ('D063','MERCIER','201, bvd du Nord','Toulouse',null,-2250);
INSERT INTO clients VALUES
    ('F400','JACOB','78, ch. du Moulin','Bruxelles','C2',0);

INSERT INTO produit VALUES ('CS262','CHEV. SAPIN 200x6x2',75,45);
INSERT INTO produit VALUES ('CS264','CHEV. SAPIN 200x6x4',120,2690);
INSERT INTO produit VALUES ('CS464','CHEV. SAPIN 400x6x4',220,450);
INSERT INTO produit VALUES ('PA45' ,'POINTE ACIER 45 (1K)',105,580);
INSERT INTO produit VALUES ('PA60' ,'POINTE ACIER 60 (1K)',95,134);
INSERT INTO produit VALUES ('PH222','PL. HETRE 200x20x2',230,782);
INSERT INTO produit VALUES ('PS222','PL. SAPIN 200x20x2',185,1220);
INSERT INTO commande VALUES ('30178','K111','2015-12-21');
INSERT INTO commande VALUES ('30179','C400','2015-12-22');
INSERT INTO commande VALUES ('30182','S127','2015-12-23');
INSERT INTO commande VALUES ('30184','C400','2015-12-23');
INSERT INTO commande VALUES ('30185','F011','2016-01-02');
INSERT INTO commande VALUES ('30186','C400','2016-01-02');
INSERT INTO commande VALUES ('30188','B512','2016-01-03');
INSERT INTO detail VALUES ('30178','CS464',25);
INSERT INTO detail VALUES ('30179','PA60',20);
INSERT INTO detail VALUES ('30179','CS262',60);
INSERT INTO detail VALUES ('30182','PA60',30);
INSERT INTO detail VALUES ('30184','CS464',120);
INSERT INTO detail VALUES ('30184','PA45',20);
INSERT INTO detail VALUES ('30185','PA60',15);
INSERT INTO detail VALUES ('30185','PS222',600);
INSERT INTO detail VALUES ('30185','CS464',260);
INSERT INTO detail VALUES ('30186','PA45',3);
INSERT INTO detail VALUES ('30188','PA60',70);
INSERT INTO detail VALUES ('30188','PH222',92);
INSERT INTO detail VALUES ('30188','CS464',180);
INSERT INTO detail VALUES ('30188','PA45',22);
