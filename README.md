# Projet web de 2ème année du cours du soir IPAM (La Louvière)

php version: 7.3.12  
MySQL - 10.4.11-MariaDB  

Installation
=============

Pré-requis : Xamp  

A la création de la DB, aucun admin n'est créé.  
Il faut passer par la site, créer un compte puis
dans le sgbd, modifier son roleId à 1;  

Editer le fichier hosts dans "C:\Windows\System32\drivers\etc"  
comme suis:  

```
127.0.0.1 localhost  
::1 localhost  
127.0.0.1 instru.test  
```

Ajouter à la fin du fichier "httpd-vhosts.conf":  
(Veuillez ajouter le chemin menant à votre propre dossier)
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

