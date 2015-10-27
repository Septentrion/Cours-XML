# Les espaces de noms

## Définition

Les espaces de noms sont un mécanisme permettant d'utiliser plusieurs « dialectes » XML au sein du même document sans avoir à craindre de __conflit de nommage__.

Un nom d'espace de noms est un URI. Cet URI dénote une ressource sous le contrôle du créateur du vocabulaire choisi. Généralement, il s'agit d'une adresse sur un serveur web.

La spécification des espaces de noms n'indique pas que l'URI devrait être utilisée comme source d'information, à des fins de validation ou d'import, par exemple. L'URI est une simple chaîne de caractères et dans bien des cas, elle renvoie vers une page permettant à un lecteur humain de comprendre le vocabulaire XML choisi.

[Exemple : XHTML](http://www.w3.org/1999/xhtml)

Les URI sont traditionnellement des URL HTTP, mais rien n'indique que ce soit une obligation.

Une déclaration d'espace de noms obéit au schéma suivant :

```
NAMESPACE ::= 'xmlns' (':' PREFIX)? "=" URI
```

Par exemple : `xmlns:xhtml="http://www.w3.org/1999/xhtml"`

Il es possible de ne pas indiquer de préfixe. Dans ce cas, on considère que le vocabulaire _par défaut_ du document est celui indiqué dans xmlns.

## Utilisation

Pour utiliser le vocabulaire dans un document, il suffit d'associer à l'élément le préfixe défini pour le vocabulaire.


```xml
<?xml version="1.1"?>
<!-- Exemple utilisant des URN pour les espaces de noms -->
<bk:book xmlns:bk='urn:loc.gov:books'
         xmlns:isbn='urn:ISBN:0-395-36341-6'>
    <bk:title>Cheaper by the Dozen</bk:title>
    <isbn:number>1568491379</isbn:number>
</bk:book>
```

Un espace de noms peut être associé à un fragment quelconque du document (pas seulement à la racine)

## Restrictions