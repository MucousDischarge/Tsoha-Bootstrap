-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO Kisa (id, nimi, ajankohta, nippelitieto) VALUES (1, 'Koivistolan kisat', '2012-12-12', 'Jokavuotiset kisat');

INSERT INTO Kilpailija (id, nimi, nippelitieto) VALUES (1234, 'Matti Huhtasaari', 'Kunto hyvä');
INSERT INTO Kilpailija (id, nimi, nippelitieto) VALUES (1235, 'Juhani Ojatalo', 'Spurtti hyvä');

INSERT INTO Valipiste (id, kisa_id) VALUES (12, (SELECT id from Kisa WHERE id=1));

INSERT INTO Aika (valipiste_id, kilpailija_id, aika) VALUES ((SELECT id from Valipiste WHERE id=12), (SELECT id from Kilpailija WHERE id=1234), to_timestamp('200612251011131516','YYYYMMDDHHMISSFF'));

INSERT INTO Kisanumero(kilpailija_id, kisa_id, kisanumero) VALUES ((SELECT id from Kilpailija WHERE id=1234), (SELECT id from Kisa WHERE id=1), 2);