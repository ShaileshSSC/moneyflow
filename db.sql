CREATE DATABASE ext;

USE ext;

CREATE TABLE bestellingen (
	id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    reservering_id int(11) not null,
    menuitem_id int(11) not null,
    aantal int(11) null,
    geserveerd boolean DEFAULT 0
);

INSERT INTO bestellingen (reservering_id, menuitem_id, aantal, geserveerd)
VALUES 
(1, 1, 2, 0),
(2, 2, 3, 1),
(1, 3, 4, 0),
(1, 4, 1, 0);


CREATE TABLE gerechtcategorien (
	id int(11) AUTO_INCREMENT PRIMARY KEY,
    code varchar(3) null,
    naam varchar(20) null,
    UNIQUE (id,code)
);

INSERT INTO gerechtcategorien (code, naam)
VALUES 
('drk', 'Dranken'),
('hap', 'Hapjes'),
('vog', 'Voorgerecht'),
('hog', 'Hoofdgerecht'),
('nag', 'Nagerecht');


CREATE TABLE gerechtsoorten (
	id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    code varchar(3) null,
    naam varchar(20) null,
    gerechtcategorien_id int(11) not null,
    UNIQUE (id,code)
);

INSERT INTO gerechtsoorten (code, naam, gerechtcategorien_id)
VALUES 
('kj2', 'koud', 1),
('ow6', 'warm', 1),
('99j', 'bieren', 1),
('vw6', 'frisdranken', 1),
('pp0', 'warme drank', 1),
('p20', 'wijnen', 1),
('p96', 'koude hapjes', 2),
('x21', 'warme hapjes', 2),
('kl8', 'vega vis', 4),
('po7', 'ijs', 5),
('16g', 'mousse', 3);

CREATE TABLE klanten (
	id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    naam varchar(20) not null,
    telefoon varchar(11) not null,
    email varchar(128) not null
);

INSERT INTO klanten (naam, telefoon, email)
VALUES 
('shai', '0711581', 'shai@gmaka.com'),
('preet', '0816161', 'preet@ajah.com');

CREATE TABLE menuitems (
	id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    code VARCHAR(4) null,
    naam varchar(30) null,
    gerechtsoort_id int(11) not null,
    prijs double not null,
    UNIQUE (id,code)
);

INSERT INTO menuitems (code, naam, gerechtsoort_id, prijs)
VALUES 
('jks', 'Pasta', 9, 8.95),
('sh8', 'Chocolade ijs',10 , 3.50),
('po9', 'Cola zero', 4, 2.50),
('po9', 'Thee', 5, 2.00);


CREATE TABLE reserveringen (
	id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    tafel int(11) null,
    datum DATE not null,
    tijd TIME not null,
    klant_id int(11) not null,
    aantal int(11) not null,
    status tinyint(4) not null DEFAULT 1,
    datum_toegoevoegd TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    aantal_k int(11) DEFAULT 0,
    allergieen text null,
    opmerkingen text null
);

INSERT INTO reserveringen (tafel, datum, tijd, klant_id, aantal, status, datum_toegoevoegd, aantal_k, allergieen, opmerkingen)
VALUES 
(4, '2021/12/15', '12:00', 1, 5, 1, null, 0, 'noten', 'plek bij het raam'),
(8, '2021/12/14', '13:00', 2, 2, 1, null, 0, 'geen alergie', 'graag kinderstoel');

CREATE TABLE beheerder (
	id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    gebruikersnaam varchar(100),
    wachtwoord varchar(100)
);

INSERT INTO beheerder
VALUES (0, 'admin', 'admin');