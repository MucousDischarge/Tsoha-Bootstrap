-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('Koivistolan kisat 2015', '2015-02-20 14:00', 2);
INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('Kuopion kisat 2015', '2015-02-18 12:00', 5);
INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('Kakelan kesähiihto 2015', '2015-06-27 10:00', 5);
INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('Strömsön kisat 2015', '2015-01-28 10:30', 4);
INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('Rovaniemen tonttujahdit', '2014-12-24 23:00', 3);
INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('Joensuun jatkot', '2015-02-10 10:00', 5);
INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('Marttilan öljyhiihto', '2015-01-29 12:00', 4);
INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('Espoon pihahiihto 2015', '2015-02-03 13:00', 3);
INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('Helsingin piirimestaruus 2015', '2015-02-15 14:00', 8);
INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('Tampereen töminät 2015', '2015-01-29 09:00', 6);
INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES ('11. Laihialan lötkyt', '2014-02-02 10:00', 2);


INSERT INTO Kilpailija (nimi) VALUES ('Matti Huhtasaari');
INSERT INTO Kilpailija (nimi) VALUES ('Juhani Ojatalo');
INSERT INTO Kilpailija (nimi) VALUES ('Kake Kakela');
INSERT INTO Kilpailija (nimi) VALUES ('Ossi Ontuva');
INSERT INTO Kilpailija (nimi) VALUES ('Tesserakti Mato');
INSERT INTO Kilpailija (nimi) VALUES ('Jyrki Alahattula');
INSERT INTO Kilpailija (nimi) VALUES ('Matias Oskarias');
INSERT INTO Kilpailija (nimi) VALUES ('Pete Puuhamies');
INSERT INTO Kilpailija (nimi) VALUES ('Ismo Laitela');
INSERT INTO Kilpailija (nimi) VALUES ('Osmo Kokki');
INSERT INTO Kilpailija (nimi) VALUES ('Henri Hidas');

INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 1, 1);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 2, 2);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 3, 3);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 4, 4);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 5, 5);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 6, 6);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 7, 7);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 8, 8);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 9, 9);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 10, 10);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (3, 1, 11, 11);

INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 1, 1);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 2, 2);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 3, 3);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 4, 4);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 5, 5);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 6, 6);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 7, 7);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 8, 8);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 9, 9);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 10, 10);
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (1, 1, 11, 11);

INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 1, 1, '2015-02-20 15:23:56');
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 2, 2, '2015-02-20 15:22:04');
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 3, 3, '2015-02-20 15:25:46');
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 4, 4, '2015-02-20 15:20:20');
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 5, 5, '2015-02-20 15:21:42');
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 6, 6, '2015-02-20 15:22:20');
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 7, 7, '2015-02-20 15:20:12');
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 8, 8, '2015-02-20 15:24:01');
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 9, 9, '2015-02-20 15:23:59');
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 10, 10, '2015-02-20 15:25:32');
INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero, aika) VALUES (1, 2, 11, 11, '2015-02-20 15:35:50');

INSERT INTO Kayttaja(kayttajanimi, salasana) VALUES ('kayttajanimi', 'salasana');
INSERT INTO Kayttaja(kayttajanimi, salasana) VALUES ('nimi', 'salasana');