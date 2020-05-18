
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

- [x] Pouvoir cliquer sur une ville pour afficher la liste des projets dans la ville (affichage similaire à la page d'une catégorie)
- [x] Ajouter un formulaire de création de compte accessible dans le menu principal lorsque l'internaute n'est pas connecté
- [x] Ajouter un formulaire de login accessible dans le menu principal lorsque l'internaute n'est pas connecté
- [x] Afficher sur la page d'accueil un bouton pour proposer un nouveau projet (uniquement visible si l'utilisateur est connecté)
- [x] Créer la page de profile d'un internaute (uniquement visible si l'utilisateur est connecté)
- [x] Pouvoir modifier ses informations de profile
- [x] Afficher la liste des projets de l'utilisateur connecté sur sa page de profile
- [x] Pouvoir modifier / supprimer les projets dans la liste des projets de l'utilisateur (attention à la sécurité sur cette fonctionnalité !)
- [x] Pouvoir ajouter un nouveau projet dans la base de données
- [x] L'administrateur du site aura également accès à une interface d'administration très basique lui permettant de gérer facilement la liste des villes et des catégories et de pouvoir supprimer des comptes utilisateurs ou bien des projets