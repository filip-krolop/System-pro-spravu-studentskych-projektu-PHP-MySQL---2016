# Systém pro správu studentských projektů (PHP, MySQL) - 2016
Maturitní práce - závěrečný samostatný projekt na střední škole

---

## Stručný popis:

Jednalo se o aplikaci určenou vedoucímu maturitních prací, aplikace měla za cíl sloužit ke shromažďování studentských projektů, využívala jazyka PHP a komunikace s MySQL databází, kde byla uložena data týkající se jednotlivých projektů. V rámci webového rozhraní aplikace bylo možné přihlásit se klasickým způsobem pomocí administrátorského loginu a hesla (ověření oproti loginu a hashi hesla uloženém v databázi), přihlásit se pomocí přihlašovacích údajů do školní sítě (využito protokolu IMAP, aplikace běžela na školním serveru), po úspěšném přihlášení se zobrazil seznam uložených projektů ve formátu tabulky, bylo možné zde projekty filtrovat, řadit podle nastavených kriterii, vložit nový projekt do databáze (včetně uploadu souboru s přílohou), upravit již existující projekt nebo jej odstranit. Protože jsem řešil i design webové aplikace pomocí kaskádových stylů a částečně JavaScriptu, byla zde přítomna i funkce zjednodušeného zobrazení seznamu projektů určená pro tisk.

---

## Konfigurační soubory:

Individuální nastavení pro databázi/cestu k uploadovaným souborům - vše v jednom souboru:
 - soubor: `MP - final/cfg/config.php`

(defaultní cesta `./storage/`)

Pro upload souborů je nutno pro adresář `/storage/` nastavit CHMOD práva na 777, jinak se upload nezdaří.

---

Tabulky pro import do databáze:
 - soubor: `dbImport.sql`


Login do MySQL DB:
 - username: `mproj`