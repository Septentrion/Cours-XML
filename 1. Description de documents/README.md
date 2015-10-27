# Décrire des documents

Décrire des documents a toutjours été une préoccupation de l'informatique.

Dès 1945, dans son article « As we may think », Vannevar Bush, conseiller du président Roosevelt, imaginait un ordinateur (fictif) appelé Memex, qui permettrait de conserver de documents et de les lier entre eux. Ce faisant, il posait les bases d'une documentation structurée et multimédia sous forme d'hypertexte.

1958, création de LISP par John MacCarthy. Premier langage de programmation explicitement basé sur la manipulation de structures arborescentes, centré sur les applications mathématiques et d'intelligence artificielle. Pas de différence entre données et programme. Tout est S-Expression.

En 1960, Ted Nelson lance le projet Xanadu, dont le but est de partager de manière instantanée et universelle des donnéees informatiques. La basse de Xanadu est le document, qui est à la fois structuré (en un nombre de parts quelconque) et lié à d'autres documents. C'est la première mise en œuvre de l'hypertexte et la première formalisation de la notion de document.

Au cours des années 196x, Douglas Engelbart reprend l'idée pour développer NLS (ou oN-Line System) qui est un projet ambitieux mêlant documentation, hypertexte, interface graphique, interface utiliseur avec l'invention de la souris.

> The basic conceptual unit in NLS, at each node of the hierarchical file, is called a "statement" and is usually a paragraph, sentence, equation, or other unit that one wants to manipulate as a whole.

> A statement can contain many characters --presently, up to 2000. Therefore, a statement can contain many lines of text. Two of the "view-specification" parameters --depth in the hierarchy, and lines per statement --can be controlled during study of a document to give various overviews of it. View specifications are given with highly abbreviated control codes, because they are used very frequently and their quick specification and execution make a great deal of difference in the facility with which one studies the material and keeps track of where he is.

NLS fera l'objet en 1968 d'une des plus célèbres démonstrations de l'histoire de l'informatique connue sous le nom de « Mother of all demos ».

En 1967, William Tunnicliffe présente pour la première fois une approche qui vise à séparer le fond du d'un document de sa forme.

En 1969, Charles Goldfarb, s'appuyant sur les travaux de Tunnicliffe lance chez IBM un projet de système d'information intégré. L'idée initiale était dans un premier temps de facliter le travail des juristes pour se repérer dans un immense corpus de textes, et ensuite de faciliter la confection de documentation technique en créant des modèles et en permettant d'assembler des fragments de documents. Cela aboutit à GML (Goldfarb, Mosher, Lorie) en 1978. Goldfarb quitte IBM pour concevoir le successeur, qui s'appellera SGML et sera standardisé en 1986. SGML introduit la notion de DTD

En 1982, Adobe lance PostScript, un langage de description de document résolument orienté vers l'impression, et qui est à la base un langage de programmation complet. PostScript, qui s'impose comme une référence, donnera par la suite naissance à PDF et à d'autres variantes comme EPS pour les images.

En 1983, Leslie Lamport lance LaTeX qui devient vite l'acmé de la mise en page scientifique par la qualité de son rendu. C'est notamment un des premiers systèmes capables de faire de l'édition mathématique grâce à un langage structuré. LaTeX est un langage compilé. 

En 1984, cherchant des applications pour le nouveau MacIntosh, Steve Jobs demande à Bill Atkinson de développer HyperCard, premier outil grand public permettant la navigation hypertexte entre des documents, baptisés __cartes__.

En 1991, Tim Berners-Lee annonce HTML, le langage de description des pages web, qui se situe dans la filiation de SGML. Ce dernier est pourtant trop complexe et trop eu tolérant. HTML ne comprte pas de spécification formelle.

En 1992 praît HyTime, basé lui aussi sur SGML et permttant la représentation, axée sur une ligne de temps, de documents multimédia.

En 1998, le web explose, mais SGML est un système beaucoup trop complexe. Le W3C reconnaît comme standard les travaux menés par Tim Bray et qui aboutissent à XML 1.0. XML reprend l'essentiel de SGML, mais supprime les _oveerloads_ : déclaration SGML, adoption d'Unicode, passage de la notion de document « valide » à « bien-formé ».

En 2001, on commence à considérer les pages web non plus comme des documents mais comme des interfaces dynamiques. Commencent alors à voir le our des formats comme YAML, qui essaient d'être à la fois structurés, facilement lisibles et sans surcharge sméantique.

En 2009, Douglas Crockford introduit JSON, un format léger fondé sur JavaScript qui vise notamment à être un concurrent de XML pour les fonctions de sérialisation et de protocole de transfert sur les réseaux.

201x : Renaissance du « web sémantique » (quelquefois abusivement dénommé web 3.0) où l'on passe du document à la connaissance (héritage des graphes sémantiques et des graphes conceptuels). De nouveaux langages apparaissent, comme RDF, RDFS, OWL, JSON-LD, Turtle. Ces langages sont associés à des logiques (comme la logique de description) 

# Synthèse

Historiquement, on voit sonc se dessiner plusieurs manières de considérer ce qu'est un document.

## Par programme

On peut considérer que l'essentiel est « ce que voit l'utilisateur ». Dans ce cas, peu importe la représentation interne. On peut choisir :
* une représentation binaire : Microsoft Word
* une représentation fonctionnelle : HyperCard
* de considérer le cocuemnt comme un programme : S-Expressions, PostScript

## Privilégier le rendu

La deuxième classe sépare le document de sont traitement et de sa présentation, mais le langage reste fermé. C'et le cas de :
* LaTeX
* HTML

## Priviléfier la smantique

Une troisième approche met l'accent sur la sémantique des documents en permettant de créer son propre langage :
* XML et tous les langages dérivés (RDF,RSS, etc.)
* OWL

## La priorité au traitement

Le langage n'est plus cette fois-ci directement lié à des préoccupations de présentation, mais plutôt de performance ou de lisibilité, questions liées à l'explosion de l'informatique grand public :
* JSON, JSON-LD
* Turtle
* YAML
