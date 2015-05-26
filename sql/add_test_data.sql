-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO Kisa (id, nippelitieto) VALUES (1, 'Koivistolan kisat');

INSERT INTO Kilpailija (id, nippelitieto) VALUES (1234, 'Matti Huhtasaari');
INSERT INTO Kilpailija (id, nippelitieto) VALUES (1235, 'Juhani Ojatalo');

INSERT INTO Valipiste (id, kisa_id) VALUES (12, 1);

INSERT INTO Aika (valipiste_id, kilpailija_id, aika) VALUES (12, 1234, to_timestamp('200612251011131516','YYYYMMDDHHMISSFF'));
