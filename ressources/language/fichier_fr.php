<?php

/*
 * Traduction du nom des colonnes de chaque table
 */

/*
 * Table "User"
 */
define("_US_TITLE","Politesse");
define("_US_FIRSTNAME","Prénom");
define("_US_LASTNAME","Nom de famille");
define("_US_SOCIETY","Société");
define("_US_ADRESS1","Adresse");
define("_US_ADRESS2","Complément d'adresse");
define("_US_CITY","Ville");
define("_US_ROLE","Rôle"); // Rôle d'utilisateur, d'administrateur...
define("_US_EMAIL","E-mail");
define("_US_PASSWORD","Mot de passe");
define("_US_SHIPPER_SUBSCR_END","Date de fin de souscription");
define("_US_ACTIF","Actif/Inactif");


/*
 * Table "Transaction"
 */
define("_TR_DATE","Date de transaction");
define("_TR_AMOUNT","Montant");
define("_TR_USER","Utilisateur");
define("_TR_TYPE","Type");
define("_TR_ESTIMATE","Devis");


/*
 * Table "Parameter"
 */
define("_PA_NAME","Paramètre");
define("_PA_VALUE","Valeur");


/*
 * Table "Estimate"
 */
// define("_ES_AD","Estimate Ad");
define("_ES_PRICE","Prix estimatif");


/*
 * Table "City"
 */
define("_CI_NAME","Ville"); // En doublant avec _US_CITY
define("_CI_POSTCODE","Code postal");
define("_CI_STATE","Canton/Province");
define("_CI_COUNTRY","Pays");
define("_CI_LONGITUDE","Longitude");
define("_CI_LATITUDE","Latitude");


/*
 * Table "Category"
 */
define("_CA_NAME","Catégorie");
define("_CA_ICON","Icône de catégorie");


/*
 * Table "Ad"
 */
define("_AD_CATEGORY","Catégorie d'annonce"); // En doublant avec _CA_NAME ?
define("_AD_DEPARTURE_CI","Ville de chargement");
define("_AD_DESTINATION_CI","Ville de livraison");
define("_AD_TITLE","Titre de l'annonce");
define("_AD_DESCRIPTION","Descriptif d'annonce");
define("_AD_TOTAL_WEIGHT","Poids total");
define("_AD_OBJECT_NUM","Nombre d'objets");
define("_AD_TOTAL_VOLUME","Volume total");
define("_AD_DATE_BEG","Date de début");
define("_AD_DATE_END","Date de fin");



/*
 * Traduction des pages
 * 
 * * *
 * 
 * Traduction de PAGES/HOME.PHP
 */
define("_BIENVENUE","Bienvenue sur mon site web !");
define("_BONNE_NAVIGATION","Je vous souhaite une bonne navigation.");


/*
 * Traduction de ...
 */



?>