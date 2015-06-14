-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO Kisa (id, nimi, ajankohta) VALUES (1, 'Koivistolan kisat', '2016-05-08 14:00');
INSERT INTO Kisa (id, nimi, ajankohta) VALUES (2, 'Kuopion kisat', '2016-06-12 12:00');

INSERT INTO Kilpailija (id, nimi) VALUES (1234, 'Matti Huhtasaari');
INSERT INTO Kilpailija (id, nimi) VALUES (1235, 'Juhani Ojatalo');

INSERT INTO Aika (id, kisa_id, valipiste_id, kilpailija_id, aika) VALUES (1, 1, 1, (SELECT id from Kilpailija WHERE id=1234), to_timestamp('201605081011131516','YYYYMMDDHHMISSFF'));
INSERT INTO Aika (id, kisa_id, valipiste_id, kilpailija_id, aika) VALUES (2, 1, 2, (SELECT id from Kilpailija WHERE id=1234), to_timestamp('201605081124456179','YYYYMMDDHHMISSFF'));

INSERT INTO Kisanumero(id, kilpailija_id, kisa_id, kisanumero) VALUES (1, (SELECT id from Kilpailija WHERE id=1234), (SELECT id from Kisa WHERE id=1), 1);
INSERT INTO Kisanumero(id, kilpailija_id, kisa_id, kisanumero) VALUES (2, (SELECT id from Kilpailija WHERE id=1235), (SELECT id from Kisa WHERE id=1), 2);

INSERT INTO Kayttaja(id, kayttajanimi, salasana) VALUES (1, 'kayttajanimi', 'salasana');
INSERT INTO Kayttaja(id, kayttajanimi, salasana) VALUES (2, 'nimi', 'salasana');