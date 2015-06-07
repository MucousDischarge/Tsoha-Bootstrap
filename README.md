# Tietokantasovelluksen esittelysivu

### Yleisiä linkkejä:

###### Pääasialliset:
* [Linkki sovellukseni etusivulle (toimii)](http://ezaalto.users.cs.helsinki.fi/hemohes/)
* [Linkki dokumentaatiooni (ei päivitetty)](https://github.com/MucousDischarge/Tsoha-Bootstrap/blob/master/doc/dokumentaatio.pdf)

###### Muut:
- [Linkki hiekkalaatikolle](http://ezaalto.users.cs.helsinki.fi/hemohes/hiekkalaatikko)
- [Linkki tietokantaani (taas päivitetty)](http://ezaalto.users.cs.helsinki.fi/hemohes/tietokantayhteys)

Tein kisanumerosta serialin, kun kisoja lisäillessä sain huomata serial-muodossa olevien id:eiden automaattisesti olevan vain seuraava numero. Tällöin kisanumerot voi generoida tämän avulla automaattisesti.

Lisäksi poistin kisasta ja kilpailijasta nippelitiedot, sillä kyseessä on pelkästään tulospalvelu, jonka käyttäjiä ei juurikaan kiinnosta nippelitieto. Se veisi paljon tilaa, ja sivu näyttää ilman sitä paljon selkeämmältä. Molemmilla on yhä nimet, ja kisalla ajankohta. Nippelitietojen sijaan voisi olla kuvia. Opetusmateriaalissa on tosin puhuttu vain tekstistä ja rukseista, joten jätän kuvien lähettämisen mahdolliseksi bonukseksi aivan lopulle, koska en osaa vielä kehittää kuvauppausjärjestelmää.

###### Päivitetyt:
* [Linkki controlleriin](https://github.com/MucousDischarge/Tsoha-Bootstrap/blob/master/app/controllers/mallicontroller.php)
* [Linkki modelliin](https://github.com/MucousDischarge/Tsoha-Bootstrap/blob/master/app/models/malliluokka.php)

## Työn aihe

http://advancedkittenry.github.io/suunnittelu_ja_tyoymparisto/aiheet/Hiihtokisojen_tulospalvelu.html
