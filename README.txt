---INSTALLATION---

1) Copier/coller l'int�gralit� des fichiers

2) Ouvrir MySQL et importer le dossier zipp� tp_facture.sql.zip 

3) Ouvrir connexion.php

4) Utiliser les informations clients suivants pour se connecter :
-pseudo : a
-mot de passe : a

Cliquer sur le bouton "D�connexion" pour mettre fin � la session.

---FONCTIONNEMENT---

Apr�s la connexion via connexion.php, le client arrive sur main.php.

Il peut � tout moment aller sur main.php ou manip.php.

En envoyant des informations pour la recherche d'un produit ou d'une facture
sur main.php, le client est dirig� vers choix.php o� sont affich�s les r�sultats de sa
requ�te.

En arrivant sur manip.php, il pourra donner des param�tres pour manipuler les donn�es.
Les informations sont envoy�es sur la m�me page (manip.php).
Les requ�tes SQL pour r�pondre � la demande du client sont faites juste apr�s la r�ception
des informations sur la page.

Lorsqu'il appuie sur le bouton D�connexion, il est dirig� vers deco.php o� sa session est
d�truite puis il retourne � connexion.php.