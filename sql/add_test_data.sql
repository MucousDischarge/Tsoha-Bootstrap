-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO Kisa (id, nimi, ajankohta) VALUES (1, 'Koivistolan kisat', '2016-05-08 14:00');
INSERT INTO Kisa (id, nimi, ajankohta) VALUES (2, 'Kuopion kisat', '2016-06-12 12:00');

INSERT INTO Kilpailija (id, nimi) VALUES (1234, 'Matti Huhtasaari');
INSERT INTO Kilpailija (id, nimi) VALUES (1235, 'Juhani Ojatalo');

INSERT INTO Valipiste (id, kisa_id) VALUES (1, (SELECT id from Kisa WHERE id=1));
INSERT INTO Valipiste (id, kisa_id) VALUES (2, (SELECT id from Kisa WHERE id=1));

INSERT INTO Aika (id, valipiste_id, kilpailija_id, aika) VALUES (1, (SELECT id from Valipiste WHERE id=1), (SELECT id from Kilpailija WHERE id=1234), to_timestamp('201605081411131516','YYYYMMDDHHMISSFF'));
INSERT INTO Aika (id, valipiste_id, kilpailija_id, aika) VALUES (2, (SELECT id from Valipiste WHERE id=2), (SELECT id from Kilpailija WHERE id=1234), to_timestamp('201605081524456179','YYYYMMDDHHMISSFF'));

INSERT INTO Kisanumero(id, kilpailija_id, kisa_id, kisanumero) VALUES (1, (SELECT id from Kilpailija WHERE id=1234), (SELECT id from Kisa WHERE id=1), 1);
INSERT INTO Kisanumero(id, kilpailija_id, kisa_id, kisanumero) VALUES (2, (SELECT id from Kilpailija WHERE id=1235), (SELECT id from Kisa WHERE id=1), 2);

INSERT INTO Kayttaja(id, kayttajanimi, salasana) VALUES (1, 'kayttajanimi', 'salasana');
INSERT INTO Kayttaja(id, kayttajanimi, salasana) VALUES (2, 'nimi', 'salasana');