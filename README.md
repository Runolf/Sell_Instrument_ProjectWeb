# Projet web de 2ème année du cours du soir IPAM (La Louvière)

php version: 7.3.12  
MySQL - 10.4.11-MariaDB  

Installation
=============

Pré-requis : Xamp  

Editer le fichier hosts dans "C:\Windows\System32\drivers\etc"  
comme suis:  

```
127.0.0.1 localhost  
::1 localhost  
127.0.0.1 instru.test  
```

Ajouter à la fin du fichier "httpd-vhosts.conf":  
```
<Directory "C:\xampp\htdocs\Sell_Instrument_ProjectWeb\project">  
AllowOverride All  
Options Indexes MultiViews FollowSymLinks  
Require all granted  
</Directory>  
```
```
<VirtualHost *:80>  
DocumentRoot C:\xampp\htdocs\Sell_Instrument_ProjectWeb\project  
ServerName instru.test  
</VirtualHost>  
```

url home : http://instru.test

