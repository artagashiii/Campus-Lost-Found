# Campus Lost & Found

Platformë web për raportimin dhe gjetjen e sendeve të humbura brenda kampusit universitar. Projekti është ndërtuar me PHP (vanilla) duke u fokusuar në arkitekturën OOP dhe menaxhimin e sesioneve.

Punuar nga: 
Arta Gashi
Aulona Xhema
Argjenta Trepça
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

1. Vendosni projektin në folderin `htdocs` të XAMPP  
2. Emëroni folderin: `Campus-Lost-Found`  
3. Startoni **Apache Server**  
4. Aksesoni në browser:  
