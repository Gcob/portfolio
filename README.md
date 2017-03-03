#Portfolio interactif de Jacob Proulx

## Documentation

*À venir...*

## Environnement de travail local

###(expliqué pour Windows, désolé pour les Linux fans et Mac hipster)

* [Installez NodeJS](https://nodejs.org)
* Installez Typescript globalement `npm install -g typescript`
* Assurez-vous d'avoir PHP 5.6 parmis vos variable de chemin Windows `php -v`
* Installez WAMP (pour ce projet, il n'est qu'utiliser pour la BDD MySql)
* *Facultatif:* Ne pas utiliser Phpmyadmin pour visionner l'évolution de la BDD, utilisez plutot [HeidiSQL](https://www.heidisql.com/)  **(ne jamais rien modifier dans la BDD sans les commandes Symfony)**
* J'utilise [Visual Studio Code](https://code.visualstudio.com/download) pour la programmation du projet Angular, car il est optimisé pour le TypeScript

### Téléchargez les dépandances (Symfony, Angular et Grunt):

* portfolio/> `php composer.phar update`
* portfolio/web/angular> `npm install`
* portfolio/web/grunt> `npm install`

### Modifier votre fichier de configuration de Symfony `portfolio/app/config/parameters.yml` pour faire fonctionner l'application correctement.

## Faire rouler les applications Wamp, Symfony, Angular et Grunt:

Ok, ici j'explique la logique de travail: 

* Wamp fait rouler le serveur pour la base de donné, alors n'utiliser pas le url de localhost:xyz (xyz est le port que Wamp utilise), vous risquez d'avoir des erreurs :P

* Faites roulez Symfony avec la commande suivante: "portfolio/>" `php bin/console server:run`. Ce serveur sert pour les requêtes venants de l'application Angular, donc encore une fois, ne pas utiliser l'url localhost:xyz2 (xyz2 est le port que Symfony utilise). Ultimement, ce serveur sera le même que celui de la BDD, mais présentement il na pas de MySql sur celui de Symfony...

* Faites roulez Grunt sous "watch mode" pour compiler les fichiers less dès qu'ils changent. "portfolio/web/grunt>" `grunt autoCompileCss` ou pour compiler une fois : `grunt compileCss`

* Ultimement, faite rouler Angular "portfolio/web/angular>" `npm start`. Le serveur va automatiquement compiler le typescript en javascript et rafraîchir le navigateur pour vous.

> **Petite astuce:** Vous remarquerez la quantité de programme qui roule en background. 
> Pour facilité le développement sous windows 10, je vous conseil de créer un bureau virtuel `Windows Key + Ctrl + D.` 
> Pour la navigation entre les bureaux: `Windows Key + Ctrl + left/right arrow`. 
> Personnelement, je développe Angular sur mon premier bureau. je fais rouler et développe Symfony sur mon deuxième bureau virtuel et je fais rouler grunt sur mon troisième bureau. C'est à vous d'y voir ;)

## Créez et peuplé la BDD en local (formate les données de la BDD)

* `php bin/console doctrine:database:create`
* `php bin/console doctrine:schema:update --force`
* `php bin/console doctrine:fixtures:load`


## Info supplémentaires: 

pour Symfony, j'utilise FOSRest pour un environnement rest plus efficace et simpliste, FOSuser pour la gestion des utilisateurs et leurs connexion, DataFixtures pour peuplé la BDD efficacement (est utile en mode dev, mais pas en prod!!)











