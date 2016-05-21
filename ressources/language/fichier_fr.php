<?php

/*
 * Traduction du nom des colonnes de chaque table
 */

/*
 * Table "User"
 */
define("_US_TITLE","Politesse");
define("_US_FIRSTNAME","PrÃ©nom");
define("_US_LASTNAME","Nom de famille");
define("_US_SOCIETY","SociÃ©tÃ©");
define("_US_ADRESS1","Adresse");
define("_US_ADRESS2","ComplÃ©ment d'adresse");
define("_US_CITY","Ville");
define("_US_ROLE","RÃ´le"); // RÃ´le d'utilisateur, d'administrateur...
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
define("_PA_NAME","ParamÃ¨tre");
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
define("_CA_NAME","CatÃ©gorie");
define("_CA_ICON","IcÃ´ne de catÃ©gorie");


/*
 * Table "Ad"
 */
define("_AD_CATEGORY","CatÃ©gorie d'annonce"); // En doublant avec _CA_NAME ?
define("_AD_DEPARTURE_CI","Ville de chargement");
define("_AD_DESTINATION_CI","Ville de livraison");
define("_AD_TITLE","Titre de l'annonce");
define("_AD_DESCRIPTION","Descriptif d'annonce");
define("_AD_TOTAL_WEIGHT","Poids total");
define("_AD_OBJECT_NUM","Nombre d'objets");
define("_AD_TOTAL_VOLUME","Volume total");
define("_AD_DATE_BEG","Date de dÃ©but");
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
 * Traduction de Pages/inputAd.php
 */
define("_NOUVELLE_ANNONCE", "Nouvelle annonce");
define("_SAISIR_ANNONCE", "Saisir une annonce");
define("_CHOISIR_CATEGORIE", "Choisir une catégorie");
define("_SELECTION", "selection");
define("_FERMER", "fermer");
define("_CE_MOIS", "ce mois");
define("_ENREGISTRER_ANNONCE", "Enregistrer l'annonce");
// Jours abrégés
define("_JOUR_LU", "Lu");
define("_JOUR_MA", "Ma");
define("_JOUR_ME", "Me");
define("_JOUR_JE", "Je");
define("_JOUR_VE", "Ve");
define("_JOUR_SA", "Sa");
define("_JOUR_DI", "Di");
// Mois
define("_JANVIER", "Janvier");
define("_FEVRIER", "Fevrier");
define("_MARS", "Mars");
define("_AVRIL", "Avril");
define("_MAI", "Mai");
define("_JUIN", "Juin");
define("_JUILLET", "Juillet");
define("_AOUT", "Aout");
define("_SEPTEMBRE", "Septembre");
define("_OCTOBRE", "Octobre");
define("_NOVEMBRE", "Novembre");
define("_DECEMBRE", "Decembre");

/*
 * Traduction de tools/business/check_info_ad.php
 */
define("_MANQUE_TITRE", "Saisissez un titre");
define("_MANQUE_CATEGORIE", "Sélectionnez une catégorie");
define("_MANQUE_LOCALITE_DEPART", "Choisissez une localité de départ");
define("_MANQUE_LOCALITE_DESTINATION", "Choisissez une localité d'arrivée");
define("_MANQUE_DESCRIPTION", "Veuillez saisir une description pour votre annonce");
define("_MANQUE_POIDS_TOTAL", "Saisissez le poids total de la marchandise");
define("_MANQUE_NOMBRE_D_OBJETS", "Saisissez le nombre total d'objets");
define("_MANQUE_VOLUME_TOTAL", "Saisissez le volume total du transport");
define("_MANQUE_DATE_DEBUT", "Il manque la date de début");
define("_MANQUE_DATE_FIN", "Il manque la date de fin");
define("_DATES_FIN_DEBUT_INVERSEES", "Ne peut être antérieure à la date de début");
define("_ANNONCE_ENREGISTREE", "Votre annonce est enregistrée");
/*
 * Traduction des catégories
 */
define("_CATEGORIE_DEMENAGEMENT", "Déménagement");
define("_CATEGORIE_MOBILIER", "Mobilier");
define("_CATEGORIE_ELECTROMENAGER", "Electroménager");
define("_CATEGORIE_CARTONS", "Cartons");
define("_CATEGORIE_PALETTES", "Palettes");
define("_CATEGORIE_VEHICULES", "Véhicules");
define("_CATEGORIE_DEUX_ROUES", "Deux-roues");
define("_CATEGORIE_BATEAU", "Bateaux");
define("_CATEGORIE_ANIMAUX", "Animaux");
define("_CATEGORIE_DIVERS", "Divers");




/*
 * Traduction de ...
 */



?>