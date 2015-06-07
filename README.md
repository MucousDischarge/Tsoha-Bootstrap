# Tietokantasovelluksen esittelysivu

### Yleisiä linkkejä:

###### Pääasialliset:
* [Linkki sovellukseni etusivulle (toimii)](http://ezaalto.users.cs.helsinki.fi/hemohes/)
* [Linkki dokumentaatiooni (päivitetty käyttöohjeella)](https://github.com/MucousDischarge/Tsoha-Bootstrap/blob/master/doc/dokumentaatio.pdf)

Validointi ja erheiden tarkastaminen toimii.

Tuhoaminen toimii, update vähän takkuilee.

Makro tehty.

Kirjautuminen takeltelee. Käyttäjätunnus on kayttajanimi ja salasana on salasana. Kayttajatietokohde luotu.

Sessioita luonnosteltu basecontrolleriin.

Käyttöohjeet luotu.

###### Muut:
- [Linkki hiekkalaatikolle](http://ezaalto.users.cs.helsinki.fi/hemohes/hiekkalaatikko)
- [Linkki tietokantaani (taas päivitetty)](http://ezaalto.users.cs.helsinki.fi/hemohes/tietokantayhteys)

Tietokannasta:

Tein kisanumerosta serialin, kun kisoja lisäillessä sain huomata serial-muodossa olevien id:eiden automaattisesti olevan vain seuraava numero. Tällöin kisanumerot voi generoida tämän avulla automaattisesti.

Lisäksi poistin kisasta ja kilpailijasta nippelitiedot, sillä kyseessä on pelkästään tulospalvelu, jonka käyttäjiä ei juurikaan kiinnosta nippelitieto. Se veisi paljon tilaa, ja sivu näyttää ilman sitä paljon selkeämmältä. Molemmilla on yhä nimet, ja kisalla ajankohta. Nippelitietojen sijaan voisi olla kuvia. Opetusmateriaalissa on tosin puhuttu vain tekstistä ja rukseista, joten jätän kuvien lähettämisen mahdolliseksi bonukseksi aivan lopulle, koska en osaa vielä kehittää kuvauppausjärjestelmää.

Tosiaan kayttajatietokohde luotu.

## Työn aihe

http://advancedkittenry.github.io/suunnittelu_ja_tyoymparisto/aiheet/Hiihtokisojen_tulospalvelu.html
