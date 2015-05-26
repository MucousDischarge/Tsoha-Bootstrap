-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE Kisa(
  id SERIAL PRIMARY KEY, 
  nippelitieto varchar(200)
);

CREATE TABLE Kilpailija(
  id SERIAL PRIMARY KEY, 
  nippelitieto varchar(200)
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
