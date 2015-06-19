-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE Kisa(
  id SERIAL PRIMARY KEY, 
  nimi varchar(50) NOT NULL,
  ajankohta timestamp
);

CREATE TABLE Aika(
  id SERIAL PRIMARY KEY,
  kisa_id INTEGER REFERENCES Kisa(id) NOT NULL,
  valipiste_id SERIAL NOT NULL,
  kilpailija_id INTEGER REFERENCES Kilpailija(id) NOT NULL,
  nimi varchar(50) NOT NULL,
  kisanumero int NOT NULL,
  aika timestamp
);

CREATE TABLE Kayttaja(
  id SERIAL PRIMARY KEY, 
  kayttajanimi varchar(30) NOT NULL,
  salasana varchar(30) NOT NULL
);