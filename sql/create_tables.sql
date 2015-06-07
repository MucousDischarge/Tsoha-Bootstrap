-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE Kisa(
  id SERIAL PRIMARY KEY, 
  nimi varchar(50) NOT NULL,
  ajankohta timestamp
);

CREATE TABLE Kilpailija(
  id SERIAL PRIMARY KEY,
  nimi varchar(50) NOT NULL
);

CREATE TABLE Valipiste(
  id SERIAL PRIMARY KEY, 
  kisa_id INTEGER REFERENCES Kisa(id)
);

CREATE TABLE Aika(
  valipiste_id INTEGER REFERENCES Valipiste(id),
  kilpailija_id INTEGER REFERENCES Kilpailija(id),
  aika timestamp
);

CREATE TABLE Kisanumero(
  kilpailija_id INTEGER REFERENCES Kilpailija(id),
  kisa_id INTEGER REFERENCES Kisa(id),
  kisanumero SERIAL NOT NULL
);

CREATE TABLE Kayttaja( 
  kayttajanimi varchar(30) PRIMARY KEY,
  salasana varchar(30) NOT NULL
);