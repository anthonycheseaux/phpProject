<?php

$config = array(
    "db" => array(
        "db1" => array(
            "dbname" => "",
            "username" => "",
            "password" => "",
            "host" => ""
        )
    ),
    "urls" => array(
        "baseUrl" => ""
    ),
    "paths" => array(
        "resources" => "/resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "../img/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "../img/layout"
        )
    )
);
 

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));
     
defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
 
defined("LANGUAGE_PATH")
    or define("LANGUAGE_PATH", realpath(dirname(__FILE__) . '/language'));

?>