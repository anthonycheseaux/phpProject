<?php
/************************************************************\
 *
 * File			index.php
 *
 * Language		PHP
 *
 * Author		Anthony Cheseaux
 * Creation		20160419
 * Last update	20160419
 *
 * Project		teemw
 * Package		include
 * 
 * Description	common header
 * 
\************************************************************/
 require_once 'ressources/config.php';

require_once(LIBRARY_PATH . "/templateFunctions.php");

$setInIndexDotPhp = "Hey! I was set in the index.php file.";
 
$variables = array(
		'setInIndexDotPhp' => $setInIndexDotPhp
);
 
renderLayoutWithContentFile("/pages/home.php", $variables);



?>

