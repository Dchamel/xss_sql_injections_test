# xss_sql_injections_test

## Simple Admin-panel for testing XSS &amp; SQL-Injections  

I made this simple project for learning and testing how xss and sql-injections works and how to protect web-site from them.  

All XSS for testing at file:  
xss_examples.txt

All SQL-Injections for testing at file:  
sql_injection_examples.txt

Types of XSS:
1. Stored XSS  
2. Reflected XSS  
3. DOM Based XSS  

How works htmlentities() and htmlspecialchars() inside  
index.php

[OWASP - about XSS](https://owasp.org/www-community/attacks/xss/)  

Test SQL-Injections for few DB ver  
MariaDB 5.5, MySQL 5.5 (& x64), 5.6, 8.0  

Main target was Search Field  
Now tests complited for procedural and object-oriented interface  
Nex "Episode" test for the PDO (The PHP Data Objects)  

Connection to DB:  
controller/connect.php