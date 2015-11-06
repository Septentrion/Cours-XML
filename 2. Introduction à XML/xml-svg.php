<?php

// $prenom = $_GET['prenom'];
// $nom = $_GET['nom'];

$doc = new DOMDocument();
$doc->load('squelette.xml');

$xpath = new DOMXPath($doc);

// Nous commençons à l'élément racine
$query = '//html/body/main';

$entries = $xpath->query($query);

$canevas = $entries->item(0);

$svg = $doc->createElement('svg');
$svg->setAttribute('width', '400px');
$svg->setAttribute('height', '300px');

$titre = $doc->createElement('title', 'Des rectangles de toutes les couleurs');

$rec_1 = $doc->createElement('rect');
$rec_1->setAttribute('x', '0');
$rec_1->setAttribute('y', '0');
$rec_1->setAttribute('width', '200px');
$rec_1->setAttribute('height', '200px');
$rec_1->setAttribute('style', 'fill:none;stroke:slategray;stroke-width:2px;');

$svg->appendChild($titre);
$svg->appendChild($rec_1);
$canevas->appendChild($svg);

echo $doc->saveHTML();

?>