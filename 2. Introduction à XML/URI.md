# URI

Toute ressource est repérée par un identifiant unique. C'est ce que l'on appelle URI (Uniform Resource Identifier).

Cette notion comprend deux sous-espèces : les URL (Uniform Resource Locator) et URN (Uniform Resource Name)

Un URI répond à la syntaxe suivante :
```
schema:identifiant
```

`schema` est un nom désignant un langage particulier
`identifiant` est un nom unique dont la syntaxe dépend du `schema` utilisé.

Cf. [RFC 1738(]https://www.ietf.org/rfc/rfc1738.txt)

La différence entre les URN et les URL tient à la __localisation__.

* Un __URL__ est un nom qui fournit également le moyen d'accéder à la ressource considérée. C'est typiquement le cas pour les adresses des pages web, ou d'un fichier via ftp.
* Un __URN__ est juste un identifiant unique comme, par exemple, le n° ISBN d'un livre. Il identifie précisément la ressource mais ne permet pas d'y accéder.

Exemples :

```
http://www.omega-one.org/~carton/
sftp://carton@omega-one.org
tel:+33-1-57-27-92-54
sip:0957279254@freephonie.net
file://home/carton/Enseignement/XML/Cours/XSLT

urn:oasis:names:tc:docbook:dtd:xml:docbook:5.1
urn:publicid:-:W3C:DTD+HTML+4.0:EN
```

# URL

L'URL permet d'accéder à une ressource, voire à un fragemnt de ressource.

Sur le web, par le protocole HTTP, les URL sont de la forme :
```
http://<domaine>/<chemin>/<nom-de-la-ressource>#<fragment>?<query>
```

A noter que le `//` fait partie de l'adresse et indique que le domaine est à la racine du DNS.

Certaines parties peuvent être omises :

* <chaine-vide> : correspond à la ressource courante
* <chemin>/ressource> : correspond à une adresse relative au dossier courant
* /<chemin>/ressource> : correspond à une adresse relative au domaine courant
* http://<domaine>/<chemin>/ressource> : correspond à une adresse absolue

# URN

Les URN ont pour syntaxe :
```
urn:<NID>:<NSS>
```

où :
* `NID` représente un espace de nom (arbitraire)
$ `NSS` l'identifiant de la ressource, dont les segments sont eux-mêmes séparés lar le caractère `:`
