#Veille TP1

## Développer un site d'une page utilisant l'effet  parallaxe et y intégrer des images et des animations SVG


### Pour voir le projet hébergé sur un serveur:

[http://168.235.91.68/veille/tp1/](http://168.235.91.68/veille/tp1/)

### Instructions pour installé le projet en local:

* Avoir un serveur locale (ex.: WAMP),

* Mettre en marche les services du serveur local (Apache et Php),

* Cloné le projet dans le répertoire du serveur virtuel (ex.: "C:\wamp\www\"),

	* `git clone https://github.com/Gcob/veille-tp1`

** **notez que les dépandances de grunt ne seront pas hébergé sur le repo git et devront toujours etre installé en locale à l'aide des commandes suivantes**
	
* Installé grunt comme ceci:(node js et npm doit être préalablement installé)

	* `npm install -g grunt-cli`

	* `npm install`

* Compilé le less en css avec grunt (et minifier du meme coup):

	* `grunt compileCss`
	* `grunt autoCompileCss` pour compilé dès qu'un fichier less est modifié

* Minifier les svg avec grunt:

	* `grunt minifySvg`
	
* Minifier le html avec grunt:

	* `grunt minifyHtml`