# BVWA
BVWA(Bhineka Tech Vulnerable Web Apps) merupakan web application yang dirancang memiliki beberapa kerentanan yang dapat di exploitation. 
BVWA Ditujukkan untuk para Pentester, Bug Hunter maupun Security Researcher yang berguna untuk mempelajari suatu vulnerability pada web aplikasi.

**Beberapa bug atau kerentanan yang terdapat pada BVWA diantaranya**:\
-SSRF(Server side request forgery)\
-Execution After Redirect\
-SQL Injection\
-IDOR(Insecure Direct Object Reference)\
-Information Disclosure\
-Arbitrary File Download\
-Broken Authentication\
-Cross Site Scripting(XSS)


**Struktur pada source code dan tech stack pada BVWA**:\
-PHP Native\
-CRUD\
-MVC(Model View Controller)\
-PDO(PHP Data Object)\
-MySQL

**Installation**
> 1. Download atau git clone repository: https://github.com/ibrahimzx/bvwa \
> 2. Setup webserver beserta database pada local komputer\
> 3. Pindahkan folder bvwa pada root directory webserver contohnya jika di windows /xampp/htdocs/ \
> 3. Import bvwa.sql pada phpmyadmin atau software tools dbms lainnya\
> 4. Edit dan sesuaikan konfigurasi database pada /bvwa/app/config/config.php\
> 5. Installation Selesai dan bisa diakses pada http://localhost/bvwa/

_Happy Hacking :)_
