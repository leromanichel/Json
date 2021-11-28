# API JSON

API JSON est une api pour comprendre les interaction entre le format json et une BDD

## Installation

Étape 1 (Création BDD):
  - ouvrir Wamp
  - taper http://localhost/phpmyadmin/
  - vous arriver sur une interface
  -![image](https://user-images.githubusercontent.com/46035188/143771277-451eb577-bc7e-44c9-9780-902371149154.png)
  - entrer root dans utilisateur
  - puis Executer


  - Dans l'interface cliquer sur "Nouvelle base de données"
  - ![image](https://user-images.githubusercontent.com/46035188/143771418-0becf811-c31e-4220-a452-e3f6a67858f8.png)
  - Puis rentrer "json" dans le champ de gauche et séléctionner utf8_bin
  - ![image](https://user-images.githubusercontent.com/46035188/143771498-775df685-f331-4f7a-8b19-62d453b0fd37.png)
  
  
  - Ensuite cliquez sur importer dans le menu du haut
  - ![image](https://user-images.githubusercontent.com/46035188/143771600-60850805-d6a1-4878-aeef-5143dd4a51f9.png)
  - puis cliquez sur choisir un fichier 
  - ![image](https://user-images.githubusercontent.com/46035188/143771625-0cad08be-b3a6-436b-bf1d-3bb2075e6baf.png).

  - Séléctionner le fichier json.sql puis sur le bouton éxécuter en bas de page
  - ![image](https://user-images.githubusercontent.com/46035188/143771674-5441f822-6808-4e0b-8b2d-7318ab2fbafd.png)
  - ![image](https://user-images.githubusercontent.com/46035188/143771705-19d2a7a5-01d9-4889-a94c-aaad633c1808.png)


  - Une BDD avec des valeurs de test on été ajouter sur le menu de gauche
  - ![image](https://user-images.githubusercontent.com/46035188/143771741-289ff5fc-6467-45d8-898f-6d6a64b55a0a.png)
  - Si vous voulez voir ces donnée, cliquez sur vols



Étape 2 Installation de postman:
  - Rendez-vous sur le site https://www.postman.com/downloads/ et télécharger l'installeur x64
  - Ensuite lancer PostMan et cliquer sur le +
  - ![image](https://user-images.githubusercontent.com/46035188/143771978-51383119-130b-4cb1-beb5-ffc35116e437.png)

  - Ensuite Cliquer sur le bouton GET et selectionner POST
  - ![image](https://user-images.githubusercontent.com/46035188/143772138-230a58c8-6bfe-4f10-a45c-387ac8dc03c6.png)

  - C'est ici que s'afficheron les donnée json


Étape 3 Utilisation de postman:
  - Dans l'URL a coté du bouton POST, saisisser le chemin d'accès des fichiers php
  - ![image](https://user-images.githubusercontent.com/46035188/143772309-5314e3d4-4e69-4375-a0b3-46e88e8fef9b.png)
  - c'est a la place de "afficher_vol.php", que vous mettrez le nom du fichier que vous vouler utiliser
  - Puis cliquer sur "send" a droite

  - Dans les paramètre, il est important de mettre comme clé le nom de la colonne que vous voulez utilisez (ville_depart par exemple)
  - puis dans le champ value la valeur que vous voulez filtrez
  - ![image](https://user-images.githubusercontent.com/46035188/143772401-f15b7ff8-0d3b-459a-af83-1034b6775b74.png)


## Contributing
Valérian Touzard
Ugo Pénet
Kristopher Planque
