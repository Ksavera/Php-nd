File Manager

Sukurkite failų valdymo sistemą.
Veikiantis pavyzdys: https://tinyfilemanager.github.io/demo/
Reikalavimai:

- Kiekvieną direktorija turi turėti priskirtą nuorodą patekimui į ją.
- Kiekvienos direktorijos viduje turi būti nuoroda grįžimui atgal į aukštesnio lygio folderį.
  Kiekvienoje direktorijoje turi būti galimybė sukurti naują failą ARBA naują folderį.
  ! Prie kiekvieno failo pavadinimo atvaizduokite ikoną populiariausiems failų formatams (bent dešimčiai). Jeigu ! ! ! failo formatas nežinomas atvaizduokite standartizuotą ikoną.
- Sukurkite galimybę pašalinti failą arba direktoriją.
  Sukurkite galimybę masiškai (pasirinkus daugiau negu vieną) pašalinti pasirinktus failus ir folderius.
- Apribokite pašalinimo funkcionalumą taip, kad pašalinti pagrindinio (file_manager.php) failo nebūtų įmanoma.
- Sukurkite galimybę pakeisti failo (išskyrus pagrindinį failą) arba direktorijos pavadinimą.

File saving

Sukurkite failą: save.php, kuriame parašykite programą kuri, toje pačioje direktorijoje,
sukurtų failą skaičius.txt ir jame išsaugotų atsitiktinį stringą sudarytą iš 3 lotyniškų mažųjų
raidžių. Stringo generavimui pasinaudokite funkcija rand().
Sukurkite failą: catch.php, kuriame aprašykite programą kuri generuotų stringą pagal prieš tai buvusią taisyklę ir jį sutikrintų su prieš tai faile išsaugota reikšme. Jei šie du stringai nesutampa veiksmą kartokite tol kol jie abu bus vienodi, o naršyklėje išveskite visus sugeneruotus stringus rezultatui gauti.

Pabandykite apsunkinti užduotį didinant simbolių kiekį, patikrinkite kokį didžiausią kiekį operacijų gali atlikti jūsų kompiuteris.
