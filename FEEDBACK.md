# Feedback #
## De opdrachten ##
| Opdracht | Goed (5) | Voldoende (3) | Onvoldoende (1) | Niet (0) | Score (35)|
| :------- | :---: | :---------: | :-----------: | :----: |---:|
| De leerling voorziet een formulier waar de gebruiker een nieuwe taak kan invoeren | |X | | |3 |
| De leerling toon de lijst van taken in een tabel.  | X| | | | 5|
| De leerling zorgt dat de layout responsief is. (Bootstrap)  | | X| | |3 |
| De leerling creeërt een correcte databank + tabel voor de gegevens. | | | X| |1 |
| De leerling kan de gegevens van een taak bewaren in een databank. | | | | X|0 |
| De leerling kan de gegevens uitlezen uit de databank. | | | X| |1 |
| De leerling voorziet formulier-validatie in JavaScript. | | | | X|0 |

## Uitbreiding ##
| Opdracht | Goed (5) | Voldoende (3) | Onvoldoende (1) | Niet (0)| Score (15)|
| :------- | :---: | :---------: | :-----------: | :----: |---:|
| De leerling voegt een JavaScript filter toe aan de taken. ||||X|0|
| De leerling voegt meerdere gebruikers toe, die elk alleen hun eigen taken kunnen zien.||||X|0|
| De leerling voegt Bootstrap-modals toe voor het bewerken en verwijderen van taken.||||X|0|
| De leerling zorgt dat een 'verantwoordelijke' gebruiker taken kan toekennen aan anderen. ||||X|0|
| De leerling gebruikt AJAX om de lijst dynamisch bij te werken.||||X|0|

## Opmerkingen ##
* Je navigatie zit in je <head>-tags. Deze hoort daar niet thuis! (-2).
* De index-pagina is een login-formulier dat verwijst naar login.php. Daar gebeurt de correcte controle (+1) maar toon je weer een login-form? Bovendien doe je geen controle of er al iemand is ingelogd of niet (-2).
* Je 'post.php' bevat zowel 'view' als 'server' code.(-2).

Je behaalde een score van __11/35__ en __0/15__

### Mondelinge verdediging ###
* Wat doet de methode: mysqli_real_escape_string()? Waarom gebruik je niet de functie van je $conn?
* Wat doet de methode: htmlspecialchars()?
* post.php:79 -> href zonder pagina?
