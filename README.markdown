## CakePHP 3 - zadanie testowe (sklep z grami)

#### Tre�� zadania

Opis rzeczywisto�ci
Na pewnym wortalu mo�na kupowa� gry komputerowe.
Administrator ma mo�liwo�� dodawania nowych gier do sklepu.
Informacje potrzebne do rejestracji gry:

    Nazwa gry
    Gatunek (do wyboru ze zdefiniowanej puli)
    Wydawca
    Data wydania
    Cena
    Ilo�� dost�pnych egzemplarzy

Klient ma mo�liwo�� wykonania prostego zakupu gry. W pierwszym kroku wybiera gatunek, kt�ry go interesuje. Wy�wietlaj� si� dost�pne gry z wybranego gatunku. Klient wybiera jedna z gier i klika w przycisk - np. �KUP�. Wy�wietla si� formularz z polem do wpisania adresu mailowego. Po zatwierdzeniu - na adres mailowy klienta - wysy�ana jest prosta informacja o powodzeniu zakupu.

Po udanym zakupie mail klienta zostaje automatycznie dodany do subskrypcji danego gatunku. Subskrypcja dzia�a w taki spos�b, ze do klienta wysy�ane s� alerty o dodaniu przez administratora nowej gry z danego gatunku. Przyk�adowa tre��: �Na portalu pogrom.pl dodana zosta�a nowa gra z gatunku {nazwa gatunku} o tytule {tytu� gry}�.

Je�li sprzedany zosta� ostatni egzemplarz danej gry, do administratora wysy�any jest mail z informacj� typu: �Sprzedany zosta� ostatni egzemplarz gry {tytu� gry}�.


#### Komentarz

Aplikacj� nale�y stworzy� w najnowszej wersji frameworka CakePHP - wersji 2.x lub 3.x (u�ywamy PHP 5.6.x). Za zarz�dzanie danymi powinna odpowiada� baza danych MySQL.

Do prezentacji danych wystarczy domy�lny CSS CakePHP � nie ma potrzeby tworzenia w�asnych layout�w.

Implementacja dodatkowych funkcjonalno�ci panelu administracyjnego (poza zdefiniowanym), czy mechanizmu uwierzytelniania, nie jest wymagana.

Opr�cz kodu, nale�y dostarczy� tak�e schemat bazy danych wykonany w programie MySQL Workbench.


#### Instalacja

- composer install
- trzeba zaimportowa� plik "db/dump.sql"

#### Inne

- aby doda� gr� jako admin trzeba w adresie przegl�darki wpisa� sufiks "/admin"