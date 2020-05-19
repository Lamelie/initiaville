
- [x] Afficher sur la page d'accueil la liste des 3 derniers projets proposés

- dans le controller Project, modifier la fonction index, et remplacer "findall" par 
"findby" pour ensuite trier sur la colonne "createdAt" de manière Descendante. Limiter à 3. 

- [x] Afficher dans le menu principal la liste des catégories

- dans le controller Default il faut créer un controller spécial "catmenu", controllant la page _menu, et 
permettant d'aller rechercher toutes les catégories. la page _menu peut ensuite les afficher dans un menu déroulant.
Ensuite, sur la page base.html.twig, un render(controler) permet d'afficher cette nouvelle fonction sur toutes les pages 
du site qui extend base.

- [x] Pouvoir cliquer sur une catégorie pour afficher ensuite la liste des projets d'une catégorie

il est nécessaire de faire un CRUD de l'entité Category afin de créer la page relative à une catégorie spécifique. il 
faut ensuite reprendre project/_card pour l'afficher les projets relatifs à cette catégorie.

- [x] Pouvoir cliquer sur le menu "Les Villes" pour afficher la liste des villes

il est nécessaire de faire un CRUD de l'entité City afin de créer la page index listant toutes les villes.

- [x] Pouvoir cliquer sur une ville pour afficher la liste des projets dans la ville (affichage similaire à la page d'une catégorie)

idem que pour la liste des projets dans chaque catégorie.

- [x] Ajouter un formulaire de création de compte accessible dans le menu principal lorsque l'internaute n'est pas connecté

commande à faire : php bin/console make:registration-form
Ajout d'un lien "s'inscrire" dans "_menu" qui n'est visible que s'il n'y a pas de "app.user" sur la page.

- [x] Ajouter un formulaire de login accessible dans le menu principal lorsque l'internaute n'est pas connecté

commande à faire : php bin/console make:auth
Ajout d'un lien "se connecter" dans "_menu" qui n'est visible que s'il n'y a pas de "app.user" sur la page.

- [x] Afficher sur la page d'accueil un bouton pour proposer un nouveau projet (uniquement visible si l'utilisateur est 
connecté)

ajout d'une condition "if app.user" autour du bouton de nouveau projet sur la page d'accueil. 

- [x] Créer la page de profil d'un internaute (uniquement visible si l'utilisateur est connecté)

- CRUD de User. sécurisation de la page user/{id}/edit afin que celle ci ne soit visible que par l'admin ou l'utilisateur concerné
(ajout des mentions isgranted dans les controllers ainsi que des conditions d'accès)

- [x] Pouvoir modifier ses informations de profil

- modification du "redirecttoroute" dans le controller vers la page de profil de l'internaute afin que l'affichage et 
l'actualisation des données se fassent sur la même page. 

- [x] Afficher la liste des projets de l'utilisateur connecté sur sa page de profile

- création d'un _card pour les projets de la liste des derniers projets de l'utilisateur contenant les actions 
"modifier" et "supprimer"

- [x] Pouvoir modifier / supprimer les projets dans la liste des projets de l'utilisateur (attention à la sécurité sur 
cette fonctionnalité !)


- [x] Pouvoir ajouter un nouveau projet dans la base de données

modification du formulaire de création de projet. Création du service src/service/FileUploader. Modification du fichier 
config/services.yaml pour l'ajout des données liées à fileUploader. Modification du controller de project afin de
gérer l'enregistrement de l'image en base de données.
Création du fichier php.ini afin de gérer "MIME exception". 

- [x] L'administrateur du site aura également accès à une interface d'administration très basique lui permettant de 
gérer facilement la liste des villes et des catégories et de pouvoir supprimer des comptes utilisateurs ou bien des 
projets

commande : composer req admin. 
Modification du fichier config/packages/easy_admin.yaml afin de gérer les données affichées dans l'admin et les actions 
possibles. 
modification de l'entité 'city' afin que les images s'enregistrent correctement dans le dossier "uploads/cities"
Traduction de l'interface d'administration via le fichier translations/messages.fr.yaml
Création d'un bouton d'accès à l'administration dans le template _menu qui n'est accessible qu'aux utilisateurs ayant 
le ROLE_ADMIN
