<?php
	require_once 'ressources/config.php';
	
	function renderLayoutWithContentFile($contentFile, $variables = array()) {
		$contentFileFullPath = TEMPLATES_PATH . "/../../" . $contentFile;
		
		if (count ( $variables ) > 0) {
			foreach ( $variables as $key => $value ) {
				if (strlen ( $key ) > 0) {
					${$key} = $value;
				}
			}
		}
		
		require_once (TEMPLATES_PATH . "/header.php");
		
		echo "<div id=\"container\">\n" . "\t<div id=\"content\">\n";
		
		if (file_exists ( $contentFileFullPath )) {
			require_once ($contentFileFullPath);
		}
		else {
			require_once (TEMPLATES_PATH . "/error.php");
		}
		
		// close container div
		echo "</div>\n";
		
		require_once (TEMPLATES_PATH . "/footer.php");
	}
	
	function renderLayout($contentFile) {
		$contentFileFullPath = TEMPLATES_PATH . "/../../" . $contentFile;
	
		require_once (TEMPLATES_PATH . "/header.php");
		
	
		
		if (file_exists ( $contentFileFullPath )) {
			require_once ($contentFileFullPath);
		}
		else {
			require_once (TEMPLATES_PATH . "/error.php");
		}
		
		
		
		require_once (TEMPLATES_PATH . "/footer.php");
	}
?>