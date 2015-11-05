# les DTD

Une DTD (Document Type Définition) est un document permettant de décrire un modèle de document SGML ou XML. Le modèle est décrit comme une grammaire de classe de documents : grammaire parce qu'il décrit la position des termes les uns par rapport aux autres, classe parce qu'il forme une généralisation d'un domaine particulier, et document parce qu'on peut former avec un texte complet.

Une DTD décrit les documents à deux niveaux : la structure logique, que l'on peut assimiler à la syntaxe abstraite, et la structure physique, que l'on peut assimiler à la syntaxe concrète.

__Au niveau de la structure logique__, une DTD indique les noms des éléments pouvant apparaître et leur contenu, c'est-à-dire les sous-éléments et les attributs. En dehors des attributs, le contenu est spécifié en indiquant le nom, l'ordre et le nombre d'occurrences autorisées des sous-éléments. L'ensemble constitue la définition des hiérarchies valides d'éléments et de texte. En revanche, les DTD ne permettent pas de poser des contraintes sur la valeur du texte comme « le contenu de l'élément X est un entier en décimal », ou encore « dans l'élément Y, toutes les séquences de blancs sont équivalentes à un seul espace ».

__Au niveau de la structure physique__, une DTD peut aussi définir des entités générales. Celles-ci ont l'un des rôles suivants :

* une référence à un fragment de document externe, typiquement un autre fichier.
* une abréviation pour un fragment de texte répétitif. Pour cette utilisation, la définition est plutôt dans le sous-ensemble interne.
* un synonyme de caractère permettant des références par nom plutôt que par un code numérique.

Une DTD déclare les objets suivants :

* des éléments (et leur hiérarchie)
* des listes d'attributs
* des entités
* des notations

## Les éléments

Un élément se déclare ainsi : `<!ELEMENT ... >`

Un élément est caractérisé par un nom (un NAME XML) et un contenu. Ce contenu peut soit un sous-arbre, soit un contenu textuel, soit être vide. On a donc alors trois cas de figure :

```
<!-- L'élément contient d'autres éléments -->
<!ELEMENT livre ...>
<!-- L'élément contient du texte -->
<!ELEMENT livre (#PCDATA)>
<!-- L'élément est vide -->
<!ELEMENT livre EMPTY>
```

Dans le cas où l'élément contient un sous-arbre XML, il faut lui-même le décrire le décrire. Par exemple:

* `(chapitre)` indique qu'un livre contient un chapitre
* `(chapitre+)` indique qu'un livre contient plusieurs chapitres (cf. expressions régulières)
* `(sommaire, chapitre+) indique qu'il y a un somme suivi de plusieurs chapitres (1 ou plus)
* `(sommaire, chapitre+, (index | glossaire)) permettrait de préciser qu'un livre se termine soit par un index soit par un glossaire.

Ainsi, la DTD permet de spécifier la famille des structures valides pour un document.

## Les attributs

Une liste attributs se déclare ainsi : `<!ATTLIST ... >`

* La liste doit faire référence à un élément de la DTD et énumère la liste des attributs autorisés.
* Un attribut est lui-même décrit par trois parties : un nom (NAME), une valeur et un statut (#REQUIRED, #FIXED ou #IMPLIED)
* Une valeur peut être décrite de la manière suivante :
  * CDATA : la valeur est du texte
  * NMTOKEN : la valeur est un NMTOKEN
  * NMTOKENS : la valeur est un e suite de NMTOKEN
  * ID : l'attribut représente un identificateur
  * IDREF : l'attribut faire référence à un élément ayant un attribut de type ID
  * IDREFS : l'attribut faire référence à plusieurs élémentq ayant un attribut de type ID
  * NOTATION : la veleur est une notation
  * ENTITY : la valeur est une entité externe
  * ENTITIES : la valeur est une collection d'entités externes
  * <EXPR> : Toute expression sur une collection finie de valeurs
* Le statut peut quant à lui valoir :
 * #REQUIRED : l'attribut est obligatoire
  * #IMPLIED : l'attribut est facultatif
  * #FIXED : la DTD doit alors préciser la valeur par défaut de l'attribut si celui-ci n'est pas présent

## Les entités

Une entité est un nom donné à un fragment de document. Ce fragment peut être donné explicitement à la définition de l'entité dans la DTD. Il peut également provenir d'un fichier externe. Dans ce cas, la définition de l'entité donne un FPI (Formal Public Identifier) et/ou une URL permettant d'accéder au document. Le fragment de document peut être inséré dans le document en utilisant simplement le nom de l'entité. Lorsque le fragment provient d'un autre fichier, l'utilisation de l'entité provoque l'inclusion du fichier en question. Le nom de chaque entité générale ou paramètre doit être un NAME XML. On distingue généralement les __entités générales__ des __entités paramètres__.

### Les entités générales

Une entité générale peut se touver sous trois formes :

```
<!-- Déclaration interne : le fragment est explicitement donné dans le document -->
<!ENTITY name fragment>
<!-- Déclaration externe : SYSTEM indique une ressource privée, contrairement à PUBLIC  -->
<!ENTITY name SYSTEM url>
<!ENTITY name PUBLIC fpi url>
```
```
<!-- Exemple d'entités internes -->
<!DOCTYPE book [
  <!ENTITY mci "Michel Colucci &aka; 'Coluche'">
  <!ENTITY aka "also known as">
]>
<book>&mci;</book>
```

Les entités définies s'utilisent dans le document XML entourées des caractères `&` et `;`.
En HTML, les entités on longtemps servi à afficher les « caractères spéciaux » : &acute;

### Les entités paramètres

Les entités paramètres ne fonctionnet pas très différemment, mais ne peuvent être utilisées que dans la DTD.

```
<!-- Déclaration interne : le fragment est explicitement donné dans le document -->
<!ENTITY % name fragment>
<!-- Déclaration externe : SYSTEM indique une ressource privée, contrairement à PUBLIC  -->
<!ENTITY % name SYSTEM url>
<!ENTITY % name PUBLIC fpi url>
```

```
<!-- Déclaration de deux entités paramètres -->
<!ENTITY % idatt   "id ID #REQUIRED">
<!ENTITY % langatt "xml:lang NMTOKEN 'fr'">

<!-- Utilisation des deux entités paramètres -->
<!ATTLIST chapter %idatt; %langatt;>
<!ATTLIST section %langatt;>
```
