<?php
echo(file_exists("language/fichier_fr.php"));
// Configuration des traductions
session_start (); // permet d'activer le contenu de la Session, soit lang

if (! empty ( $_GET ['lang'] )) {
	switch ($_GET ['lang']) {
		case "fr" :
			$_SESSION ['lang'] = "fr";
			break;
		case "en" :
			$_SESSION ['lang'] = "en";
			break;
		default :
			$_SESSION ['lang'] = "fr"; // au cas ou quelqu'un rentre autre chose que fr/en ou it
			break;
	}
}
if (empty ( $_SESSION ['lang'] )) {
	$_SESSION ['lang'] = 'fr';
}

switch ($_SESSION ['lang']) {
	case "fr" :
		$fichier_langage = "language/fichier_fr.php";
		break;
	case "en" :
		$fichier_langage = "language/fichier_en.php";
		break;
}
include($fichier_langage);

// Configuration
$config = array (
		"db" => array (
				"db1" => array (
						"dbname" => "",
						"username" => "",
						"password" => "",
						"host" => "" 
				) 
		),
		"urls" => array (
				"baseUrl" => "" 
		),
		"paths" => array (
				"resources" => "/ressources",
				"images" => array (
						"content" => $_SERVER ["DOCUMENT_ROOT"] . "../img/content",
						"layout" => $_SERVER ["DOCUMENT_ROOT"] . "../img/layout" 
				) 
		) 
);

defined ( "LIBRARY_PATH" ) or define ( "LIBRARY_PATH", realpath ( dirname ( __FILE__ ) . '/library' ) );

defined ( "TEMPLATES_PATH" ) or define ( "TEMPLATES_PATH", realpath ( dirname ( __FILE__ ) . '/templates' ) );

defined ( "LANGUAGE_PATH" ) or define ( "LANGUAGE_PATH", realpath ( dirname ( __FILE__ ) . '/language' ) );

?>