-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO Kisa (nimi, ajankohta) VALUES ('Koivistolan kisat', '2016-05-08 14:00');
INSERT INTO Kisa (nimi, ajankohta) VALUES ('Kuopion kisat', '2016-06-12 12:00');

INSERT INTO Kilpailija (nimi) VALUES ('Matti Huhtasaari');
INSERT INTO Kilpailija (nimi) VALUES ('Juhani Ojatalo');

INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 1, 1, 1, to_timestamp('201605081011131516','YYYYMMDDHHMISSFF'));
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 1, 1, to_timestamp('201605081124456179','YYYYMMDDHHMISSFF'));

INSERT INTO Kayttaja(kayttajanimi, salasana) VALUES ('kayttajanimi', 'salasana');
INSERT INTO Kayttaja(kayttajanimi, salasana) VALUES ('nimi', 'salasana');