<?php


$racine = $_GET['racine'];

$doc = new DOMDocument();
$doc->load('vocabulaire.xml');

$xpath = new DOMXPath($doc);

// Nous commençons à l'élément racine
$query = '//dictionnaire/entree/terme';

$entries = $xpath->query($query);

$selection = array();

foreach ($entries as $entry) {
	// var_dump($entry);
	$terme = $entry->nodeValue;
	if (strstr($terme, $racine) !== false) {
		$selection[] = $terme;
	}
    // echo "Livre trouvé {$entry->previousSibling->previousSibling->nodeValue}," .
    // " par {$entry->previousSibling->nodeValue}\n";
}

?>
<h1>Liste d'artistes contenant : <?php $racine ?></h1>
<ul>
<?php
foreach($selection as $artiste) {
	echo "<li>".$artiste['terme']."</li>";
}
?>
</ul>
