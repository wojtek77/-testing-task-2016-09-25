## CakePHP 3 - zadanie testowe (sklep z grami)

#### Treœæ zadania

Opis rzeczywistoœci
Na pewnym wortalu mo¿na kupowaæ gry komputerowe.
Administrator ma mo¿liwoœæ dodawania nowych gier do sklepu.
Informacje potrzebne do rejestracji gry:

    Nazwa gry
    Gatunek (do wyboru ze zdefiniowanej puli)
    Wydawca
    Data wydania
    Cena
    Iloœæ dostêpnych egzemplarzy

Klient ma mo¿liwoœæ wykonania prostego zakupu gry. W pierwszym kroku wybiera gatunek, który go interesuje. Wyœwietlaj¹ siê dostêpne gry z wybranego gatunku. Klient wybiera jedna z gier i klika w przycisk - np. „KUP”. Wyœwietla siê formularz z polem do wpisania adresu mailowego. Po zatwierdzeniu - na adres mailowy klienta - wysy³ana jest prosta informacja o powodzeniu zakupu.

Po udanym zakupie mail klienta zostaje automatycznie dodany do subskrypcji danego gatunku. Subskrypcja dzia³a w taki sposób, ze do klienta wysy³ane s¹ alerty o dodaniu przez administratora nowej gry z danego gatunku. Przyk³adowa treœæ: ‘Na portalu pogrom.pl dodana zosta³a nowa gra z gatunku {nazwa gatunku} o tytule {tytu³ gry}’.

Jeœli sprzedany zosta³ ostatni egzemplarz danej gry, do administratora wysy³any jest mail z informacj¹ typu: ‘Sprzedany zosta³ ostatni egzemplarz gry {tytu³ gry}’.


#### Komentarz

Aplikacjê nale¿y stworzyæ w najnowszej wersji frameworka CakePHP - wersji 2.x lub 3.x (u¿ywamy PHP 5.6.x). Za zarz¹dzanie danymi powinna odpowiadaæ baza danych MySQL.

Do prezentacji danych wystarczy domyœlny CSS CakePHP – nie ma potrzeby tworzenia w³asnych layoutów.

Implementacja dodatkowych funkcjonalnoœci panelu administracyjnego (poza zdefiniowanym), czy mechanizmu uwierzytelniania, nie jest wymagana.

Oprócz kodu, nale¿y dostarczyæ tak¿e schemat bazy danych wykonany w programie MySQL Workbench.


#### Instalacja

- composer install
- trzeba zaimportowaæ plik "db/dump.sql"

#### Inne

- aby dodaæ grê jako admin trzeba w adresie przegl¹darki wpisaæ sufiks "/admin"