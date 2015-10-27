# Jeux de caractères

On appelle jeu de caractère le codage qui peret la représenttion machine d'un ensemble de caractères particulier des langues écrites.

Il en existe une grande variété, et ils ont beaucoup évolué dans le temps depuis ASCII (codé sur un octet) jusqu'à Unicode.

## ASCII

Codé sur 8 bits, permet l'expression de 128 caractères :
```
xxxxxxxx (limité à 01111111 ou 0x7F)
```

## ISO-8859-1 (ISO Latin 1)

Codé sur 8 bits, il utilise les positions restantes (0x80 > 0xFF) pour coder les « caractères spéciaux » des langues européennes, soit en tout 256 caractères.

## UTF-16

Codé sur deux ou quatre octets, il permet d'exprimer les caractères sur 20 bits :
```
xxxxxxxx xxxxxxxx (caractères au maximum sur 16 octets)

110110xx xxxxxxxx 110111xx xxxxxxxx (caractères codés entre 17 et 20 bits)
```

Exemples :

* symbole de l'euro = U+20AC = 00100000 10101100
* symbole de la croche (notation musicale) = U+1D160 = 11011000 00110100 11011101 01100000

## UTF-8

Codé sur un à quatre octets et peut exprimer des caractères sur 21 bits :
```
0xxxxxxx (les caractères sur 7 bits)

110xxxxx 10xxxxxx (caractères entre 8 et 11 bits)

1110xxxx 10xxxxxx 10xxxxxx (caractères entre 12 et 16 bits)

11110xxx 10xxxxxx 10xxxxxx 10xxxxxx (caractères entre 17 et 21 bits)
```

UTF-8 présente l'avantage de coïncider avec ASCII pour les 128 premiers caractères, d'où sont avantage pour les langues occidentales.


## Rendu

Si les caractères sont définis, ils sont toutefois loin d'être implémentés dans toutes les polices.
Certains caractères peuvent donc ne pas s'afficher §c'est le cas pour les notes de musique, par exemple)
Pour afficher un caractère unicode dans une page web :
```
&#x1D160; notation hexadécimale

&#13545; notation décimale
```

## Collations

La collation permet de résoudre deux questions :

* Le traitement des ligatures
* l'ordre lexicographique

### Les ligatures

Les mots `coeur`et `cœur`sont a priori considérés comme différents. Une collation définit donc un ensemble de règles permettant de déclarer des équivalences entre chaînes de caractères.

### L'ordre lexicographique

Par défaut, celui-ci suit l'ordre ascendant des codes associés à chaque caractère. Mais la collation permet de modifier cet ordre. On pourrait dire que `é`se trouve juste après è`. Dans ce cas, `étalon` serait bien avant zèbre`, contrairement à la règle par défaut. 

