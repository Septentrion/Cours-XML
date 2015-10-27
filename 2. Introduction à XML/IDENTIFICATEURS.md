# Les identificateurs

Les identificateurs sont des chaînes de caractères qui servent à nommer les objets du langage XML, comme les éléments, les attributs, les instructions de traitement.

Ces identificateurs peuvent s'exprimer de la manière suivante :
```
NMTOKEN       ::= (NAMECHAR)+
NAMECHAR      ::= NAMESTARTCHAR | "-" | "." | [0-9] | #xB7 | [#x0300-#x036F] | [#x203F-#x2040]
NAMESTARTCHAR ::= ":" | [A-Z] | "_" | [a-z] | [#xC0-#xD6] | [#xD8-#xF6] | [#xF8-#x2FF] | [#x370-#x37D] | [#x37F-#x1FFF] | [#x200C-#x200D] | [#x2070-#x218F] | [#x2C00-#x2FEF] | [#x3001-#xD7FF] | [#xF900-#xFDCF] | [#xFDF0-#xFFFD] | [#x10000-#xEFFFF]
```
Une sous-catégorie d'identificateurs est appelée __nom XML__. Elle a pour contrainte supplémentaire que tous les noms commencent par :
```
NAME ::= NAMESTARTCHAR (NAMECHAR)*
```

Les identificateurs qui ne sont pas des noms sont appelés __jetons XML__ (NMTOKEN).

Le caractère `:` ne peut apparaître qu'une seule fois dans un identificateur car c'est un séparateur. Il lie un préfixe représentant un __espace de nom__ au nom proprement dit.

Les noms préfixés sont appelés __noms qualifiés__.

Il existe un espace de noms réservé qui est xml.


