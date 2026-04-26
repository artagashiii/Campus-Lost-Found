# Campus Lost & Found

Platformë web për raportimin dhe gjetjen e sendeve të humbura brenda kampusit universitar. Projekti është ndërtuar me PHP (vanilla) duke u fokusuar në arkitekturën OOP dhe menaxhimin e sesioneve.

Punuar nga: 
Arta Gashi
Argjenta Trepça
Aulona Xhema

---

## Struktura e Folderëve

- `/assets` – Skedarët CSS dhe imazhet statike  
- `/classes` – Logjika OOP (`IdObject.php`, `User.php`, `Item.php`)  
- `/includes` – Pjesët e ripërdorshme (`header.php`, `footer.php`)  
- `/pages` – Faqet funksionale (`lost.php`, `found.php`, `login.php`, `register.php`, `report.php`)  
- `/index.php` – Pika hyrëse e aplikacionit  

---

## Karakteristikat Kryesore

- **OOP & Inheritance**: Përdorimi i klasave abstrakte dhe trashëgimisë për objektet  
- **Session Management**: Ruajtja e gjendjes së përdoruesit dhe kontrolli i qasjes sipas roleve  
- **Server-side Validation**: Kontrolli i të dhënave përmes Regular Expressions (RegEx)  
- **Navigation**: Menu dinamike që ndryshon bazuar në statusin e kyçjes  

---

## Kredencialet për Testim (Static Data)

Pasi projekti nuk përdor databazë në këtë fazë, përdorni këto llogari:

- **Admin**: `admin@campus.edu` / `admin123`  
- **Student**: `student@campus.edu` / `student123`  

---

## Instruksionet e Ekzekutimit
Për të hapur dhe testuar projektin, ndiqni hapat e mëposhtëm:

Shkarkoni projektin: Shkarkoni skedarët dhe vendosni folderin në direktorinë htdocs të instalimit tuaj XAMPP.

Emërtimi: Sigurohuni që folderi i projektit të jetë emërtuar saktësisht: Campus-Lost-Found.

Aktivizoni Serverin: Hapni XAMPP Control Panel dhe startoni modulin Apache.

Aksesi në Browser: Hapni browser-in tuaj (Chrome, Firefox, etj.) dhe shkruani adresën e mëposhtme në address bar:
http://localhost/Campus-Lost-Found/index.php