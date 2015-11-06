<?php

$flux = array('http://rss.lemonde.fr/c/205/f/3060/index.rss', 'http://liberation.fr.feedsportal.com/c/32268/fe.ed/rss.liberation.fr/rss/58/');

$texte = $_GET['texte'];
// Créer un doc XML
$doc = new DOMDocument();
$target = new DOMDocument();

foreach ($flux as $f) {
	// Récupération du flux
	$doc->load($f);
	// Création un chemin
	$xpath = new DOMXPath($doc);
	$query = '//channel/item';
	// Exécution de la requête
	$entries = $xpath->query($query);
	// Stockage des items dans un tableau
	$selection = array();
	foreach ($entries as $entry) {
		$query_titre = 'title';
		$query_image = 'enclosure';
		$query_lien = 'link';
		$query_description = 'description';
		$titre = $xpath->query($query_titre, $entry);
		$lien = $xpath->query($query_lien, $entry);
		$image = $xpath->query($query_image, $entry);
		$desc = $xpath->query($query_description, $entry);

	if (strstr($desc->item(0)->nodeValue, $texte) !== false) {
		$item = array();
		$item['titre'] = $titre->item(0)->nodeValue;
		$item['lien'] = $lien->item(0)->nodeValue;
		$item['image'] = $image->item(0)->getAttribute('url');
		$selection[] = $item;

		$node = $target->importNode($entry, true);
		$target->appendChild($node);
	}
}

$target->save('veille.xml');

?>
<h1>Dépêches contenant : <?php $texte ?></h1>
<div>
<?php
foreach($selection as $depeche) {
	echo "<div><img src-'".$depeche['image']."'/></div>";
	echo "<div><a href='".$depeche['lien']."'>".$depeche['titre']."</a></div>";
}
?>
</div>
