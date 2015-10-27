# XML

Un document XML est composé de quatre composants :

* un prologue
* un corps
* des commentaires
* des instructions de traitement

## Le prologue

Le prologue lui-même se décompose en deux éléments :

* un entête, obligatoire
* une déclaration de DTD, facultative

L'entête a la structure suivante :
```
<?xml version="..." encoding="..." standalone = "..." ?>

* `version` indique la version de XML utilisée
* `encoding` indique le jeu de caractères, par défaut ùtf-8`
* `standalone`indique yes|no si le document est lié à des éléments externes (déclarations ou traitements)

## Le corps

Le corps du document XML comporte un élément racine unique. Cet racine est l'élément parent d'un nombre arbitraire d'autres éléments, organisés sous forme d'arbre. Un élément est aussi un __nœud__ de cet arbre.

### Les éléments

Syntaxiquement, les éléments sont représentés par des __balises__, qui entourent le contenu de l'élément.

* La balise ouvrante a le schéma suivant : `STAG ::= '<' NAME (S ATTRIBUTE)* S? '>'`
* La balise fermante a le schéma suivant : `ETAG ::= '<' '/' NAME S? '>'

`S` marque les caractères d'espacement autorisés : `S ::= (#x20 | #x9 | #xD | #xA)+`

Il existe aussi des éléments vides (terminaux) qui s'écrivent ainsi :

* La balise vide a le schéma suivant : `STAG ::= '<' NAME (S ATTRIBUTE)* S? '/' '>'`

Contrairement à HTML, le caractère `/` est obligatoire en XML

### Les attributs

Tout élément XML peut recevoir un nombre arbotraire d'attributs. Ceux-ci ont pour forme :

```
ATTRIBUTE ::= NAME '=' ATTVALUE
ATTVALUE  ::= '"' ([^<&'] | REFERENCE) '"'
REFERENCE ::= ENTITYREF | CHARREF
ENTITYREF ::= '&' NAME
CHARREF   ::= '&#' [0-9]+ ';' | '&#x' [0-9a-fA-F]+ ';'
```

### Les commentaires

Les commentaires XML on la même forme que les commentaires HTML :

COMMENT ::= '<!--' TEXTE '-->'

### Les sections littérales

Lorsque l'on veut être sûr qu'un texte ne sera pas transformé par une application XML, il est possible de déclarer une section littérale, qui s'écrit de la manière suivante :

COMMENT ::= [CDATA[' TEXTE ']]>'

Ainsi il est notamment possible d'afficher tous les caractères réservés, sauf, évidemment, la séquence `]]>`

### Les attributs particuliers

L'espace de nom `xml`définit quatre attributs qui interviennent dans le traitement des fichiers XML :

* `xml:lang`permet de définir la langue du contenu d'un élément ; équivalent au `lang`de HTML
* `xml:base` permet de xpécifier un URL de base pour le contenu de l'élément
* `xml:id` permet d'associer in identificateur à un élément
* `xml:space` permet de définir le traitement des caractères d'espacement : deux valeurs `default|preserve`

### Les instructions de traitement

XML est un langage de description de document, mais il peut contenir aussi des instructions à l'intention des appllications qui traiteront le document (typiquement des transformations XSLT)

Ces instructions dépendent évidemment de l'application à qui elles sont destinées, mais elles suivent toues la structure suivante :

```
PI       ::= '<?' PITarget (S (Char* - (Char* '?>' Char*)))? '?>'
PITARGET ::= NAME - (('X' | 'x') ('M' | 'm') ('L' | 'l'))
```

## Validation

XML est un langage extrêmement peu tolérant aux fautes, contrairement à HTML. C'est même dans cete optique qu'il a été conçu. Donc un document bien formé répond à – au moins – ces contraintes :

* Un seul élément racine pour le document 
* Toute balise ouverte doit être fermée 
* Les balises doivent être correctement imbriquées 
* Un élément ne doit pas avoir 2 attributs avec le même nom 
* Les valeurs des attributs doivent être entre guillemets (simples ou doubles) 
* Les commentaires et instructions de traitement ne doivent pas apparaître à l'intérieur des balises 
* Les caractères < et & doivent être échappés dans les données textuelles d'un élément ou d'un attribut 

