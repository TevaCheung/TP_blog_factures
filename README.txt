---INSTALLATION---

1) Copier/coller l'intégralité des fichiers

2) Ouvrir MySQL et importer le dossier zippé tp_facture.sql.zip 

3) Ouvrir connexion.php

4) Utiliser les informations clients suivants pour se connecter :
-pseudo : a
-mot de passe : a

Cliquer sur le bouton "Déconnexion" pour mettre fin à la session.

---FONCTIONNEMENT---

Après la connexion via connexion.php, le client arrive sur main.php.

Il peut à tout moment aller sur main.php ou manip.php.

En envoyant des informations pour la recherche d'un produit ou d'une facture
sur main.php, le client est dirigé vers choix.php où sont affichés les résultats de sa
requête.

En arrivant sur manip.php, il pourra donner des paramètres pour manipuler les données.
Les informations sont envoyées sur la même page (manip.php).
Les requêtes SQL pour répondre à la demande du client sont faites juste après la réception
des informations sur la page.

Lorsqu'il appuie sur le bouton Déconnexion, il est dirigé vers deco.php où sa session est
détruite puis il retourne à connexion.php.