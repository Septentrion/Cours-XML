<?php

// URL : xml-update.php?prenom=Alphonse&nom=Allais

$prenom = $_GET['prenom'];
$nom = $_GET['nom'];

$doc = new DOMDocument();
$doc->load('???.xml');

$xpath = new DOMXPath($doc);

// Nous commençons à l'élément racine
$query = '//bibliotheque/auteurs';

$entries = $xpath->query($query);

$listeAuteurs = $entries->item(0);

$auteur = $doc->createElement('auteur');
$auteur->setAttribute('id', $nom);
$nom = $doc->createElement('nom', $nom);
$prenom = $doc->createElement('prenom', $prenom);

$auteur->appendChild($prenom);
$auteur->appendChild($nom);
$listeAuteurs->appendChild($auteur);

$doc->save('???.xml');

?>
<h1>Liste d'artistes contenant : <?php $racine ?></h1>
