<?php

/*
 * Traduction du nom des colonnes de chaque table
 */

/*
 * Table "User"
 */
define("_US_TITLE","Civility");
define("_US_FIRSTNAME","Firstname");
define("_US_LASTNAME","Lastname");
define("_US_SOCIETY","Socity");
define("_US_ADRESS1","Address");
define("_US_ADRESS2","Address 2");
define("_US_CITY","City");
define("_US_ROLE","Role"); // Rôle d'utilisateur, d'administrateur...
define("_US_EMAIL","E-mail");
define("_US_PASSWORD","Password");
define("_US_SHIPPER_SUBSCR_END","End of the subscription");
define("_US_ACTIF","Activ/Inactiv");


/*
 * Table "Transaction"
 */
define("_TR_DATE","Date of transaction");
define("_TR_AMOUNT","Amount");
define("_TR_USER","User");
define("_TR_TYPE","Type");
define("_TR_ESTIMATE","Estimate");


/*
 * Table "Parameter"
 */
define("_PA_NAME","Parameters");
define("_PA_VALUE","Value");


/*
 * Table "Estimate"
 */
// define("_ES_AD","Estimate Ad");
define("_ES_PRICE","Esimated price");


/*
 * Table "City"
 */
define("_CI_NAME","City"); // En doublant avec _US_CITY
define("_CI_POSTCODE","Postal code");
define("_CI_STATE","Sate");
define("_CI_COUNTRY","Country");
define("_CI_LONGITUDE","Longitude");
define("_CI_LATITUDE","Latitude");


/*
 * Table "Category"
 */
define("_CA_NAME","Category");
define("_CA_ICON","Category icon");


/*
 * Table "Ad"
 */
define("_AD_CATEGORY","Category ad"); // En doublant avec _CA_NAME ?
define("_AD_DEPARTURE_CI","From city");
define("_AD_DESTINATION_CI","To city");
define("_AD_TITLE","Ad tilte");
define("_AD_DESCRIPTION","Ad description");
define("_AD_TOTAL_WEIGHT","Total weight");
define("_AD_OBJECT_NUM","Number of objects");
define("_AD_TOTAL_VOLUME","Total volume");
define("_AD_DATE_BEG","Starting date");
define("_AD_DATE_END","Ending date");
define("_AD_DETAILS", "Details of the ad ");
define("_AD_LIST", "List of ads");


/*
 * Traduction des pages
 * 
 * * *
 * 
 * Traduction de PAGES/HOME.PHP
 */
define("_LANGUAGE","Languages");
define("_LOGIN", "Sign in");
define("_REGISTER", "Sign up");
define("_I_AM_A_SHIPPER", "I'm a shipper");
define("_I_AM_A_CUSTOMER", "I'm a customer");
define("_REGISTER_FOR_SHIPPER", "Create shipper account");
define("_REGISTER_FOR_CUSTOMER", "Create client account");
define("_MR", "Mister");
define("_MS", "Madam");
define("_NIP", "NPA");
define("_CREATE", "Create");
define("_ALREADY_CLIENT", "Already customer ?");
define("_ALREADY_CLIENT_TEXT", "Whether you are a shipper or a customer of transportation, access your personal space to enjoy the incredible services offered by TEEMW !");
define("_SUBSCRIBE_SHIPPER", "Are you a shipper ?");
define("_SUBSCRIBE_SHIPPER_TEXT", "Go ahead and sign up for a fair price in order to assert your service with many applicants who post daily queries !");
define("_SUBSCRIBE_CUSTOMER", "Looking for a shipper ?");
define("_SUBSCRIBE_CUSTOMER_TEXT", "Create a free account and access to a dedicated area where you can post your requests and receive estimates in the shortest time !");
define("_OUR_SERVICES", "Our services");
define("_PRESTATION", "Prestations");
define("_GARANTY", "Guarantee");
define("_DEVIS", "Estimate");
define("_LEARN_MORE", "READ MORE");
define("_FILL", "Fill in");
define("_RECIEVE", "Receive");
define("_CHOOSE", "Pick up");

/*
 * Traduction de Pages/inputAd.php
 */
define("_NOUVELLE_ANNONCE", "New ad");
define("_SAISIR_ANNONCE", "Insert an ad");
define("_CHOISIR_CATEGORIE", "Pick a category up");
define("_SELECTION", "selection");
define("_FERMER", "close");
define("_CE_MOIS", "this month");
define("_ENREGISTRER_ANNONCE", "Save the ad");
// Jours abrégés
define("_JOUR_LU", "Mon");
define("_JOUR_MA", "Tue");
define("_JOUR_ME", "Wed");
define("_JOUR_JE", "Thu");
define("_JOUR_VE", "Fri");
define("_JOUR_SA", "Sat");
define("_JOUR_DI", "Sun");
// Mois
define("_JANVIER", "January");
define("_FEVRIER", "February");
define("_MARS", "March");
define("_AVRIL", "April");
define("_MAI", "Mai");
define("_JUIN", "June");
define("_JUILLET", "July");
define("_AOUT", "August");
define("_SEPTEMBRE", "September");
define("_OCTOBRE", "October");
define("_NOVEMBRE", "November");
define("_DECEMBRE", "December");

/*
 * Traduction de tools/business/check_info_ad.php
 */
define("_MANQUE_TITRE", "Enter a title");
define("_MANQUE_CATEGORIE", "Select a category");
define("_MANQUE_LOCALITE_DEPART", "Choose the 'From' locality");
define("_MANQUE_LOCALITE_DESTINATION", "Choose the 'To' locality");
define("_MANQUE_DESCRIPTION", "Please enter a description");
define("_MANQUE_POIDS_TOTAL", "Enter the total weight");
define("_MANQUE_NOMBRE_D_OBJETS", "Enter the number of objects");
define("_MANQUE_VOLUME_TOTAL", "Enter the total volume");
define("_MANQUE_DATE_DEBUT", "Starting date missing");
define("_MANQUE_DATE_FIN", "Ending date missing");
define("_DATES_FIN_DEBUT_INVERSEES", "Cannot be earlier than the starting date");
define("_ANNONCE_ENREGISTREE", "Your ad has been saved !");


/*
 * Traduction de tools/business/infoUser.php
 */
define("_ACCEPTE", "Accepted :");
define("_REFUSE", "Refused");
define("_UPDATE_INFO", "Update contact information :");
define("_DATE", "Date");

/*
 * Traduction des catégories
 */
define("_CATEGORIE_DEMENAGEMENT", "Move");
define("_CATEGORIE_MOBILIER", "Furniture");
define("_CATEGORIE_ELECTROMENAGER", "Home appliance");
define("_CATEGORIE_CARTONS", "Cardboards");
define("_CATEGORIE_PALETTES", "Pallets");
define("_CATEGORIE_VEHICULES", "Vehicles");
define("_CATEGORIE_DEUX_ROUES", "Motorbike");
define("_CATEGORIE_BATEAU", "Boat");
define("_CATEGORIE_ANIMAUX", "Pets/Animals");
define("_CATEGORIE_DIVERS", "Various");

/*
 * Traduction de pages/inputEstimate.php
 */
define("_SAISIR_DEVIS", "Enter an estimate");
define("_PRIX_PROPOSE", "Enter a price for your estimate");
define("_PAS_D_ANNONCE", "There is no ad");
define("_PROPOSER_UN_DEVIS", "Submit an estimate");
define("_MANQUE_PRIX", "You must specify a price");
define("_DEVIS_ENREGISTRE", "The estimate has been saved");

/*
 * Traduction de check_info_user.php
 */
define("_MSG_CITY", "This city does not exist.");
define("_MSG_SETSOCT", "Add a society");
define("_MSG_ERROR_EMAIL", "This e-mail is not correct.");
define("_MSG_SETMAIL", "Add an e-mail");
define("_MSG_SETCOUNTRY", "Add a country");
define("_MSG_SETPOSTCODE", "Add postal code");
define("_MSG_SETCITY", "Add a ctiy");
define("_MSG_SETADDRESS", "Add an address");
define("_MSG_SETTITLE", "Add a title");
define("_MSG_SETPASSWORD", "Add a password");
define("_MSG_SETLNAME", "Add a lastname");
define("_MSG_SETFNAME", "Add a firstname");
define("_MSG_UPDATE_SUCCESS", "Update succeeded, please logout and login again to apply update.");
define("_MSG_REGISTRATION_SUCCESS","Registration succeeded");
define("_MSG_MAIL_PASSWORD_INCORRECT", "E-mail or password incorrect!");
define("_MSG_EMAIL_USED; ","E-mail already used !");


/*
 * Traduction de info_user.php
 */
define("_INFO_USER", "Account information");
define("_CHANGE_INFO_USER", "Update contact information");


/*
 * Traduction de infoAdmin.php
 */
define("_ESTIMATE_NUMBER", "Estimate number");
define("_ADVERTISER", "Advertiser");
define("_SHIPPER", "Shipper");
define("_PRICE", "Price");
define("_NO_ESTIMATE", "No estimate to validate");
define("_ESTIMATE_TO_VALIDATE", "Estimate to validate");
define("_VALIDATE", "Validate");
define("_SHIPPER_SUBSCRIPTION_FINISHED", "Finished shipper subscriptions");
define("_SHIPPER_SUBSCRIPTION_END", "Shipper subscriptions ending");
define("_THERE_IS_NO_ONE", "There is no one");
define("_ONE_MORE_YEAR", "One more year");


/*
 * Traduction des buttons
 */
define("_AFFICHE_DEVIS", "Display estimates");
define("_SELECT_TRANSPORTEUR", "Select this shipper");
define("_OK", "Ok");
define("_INFO_TRANSPORTEUR", "Shipper information");
define("_INFO_CUSTOMER", "Customer information");


/*
 * Traduction home.php
 */
define("_TXT_PRESTATIONS", "Got a piano to ship ? You're a shipper looking for clients ?
		<br>TEEMW is the site you need. We connect shippers and their customers.");
define("_TXT_ESTIMATE", "Need to carry a heavy piece of furniture ? Put an ad on our website!
		<br>Our partners interested will shortliy submit you an estimate.");
define("_TXT_GARANTIE", "Qualified shippers at your service. 
		<br>Shippers have obtained our quality seals. They are certified TeemW and are glad to answer your expectations.");

define("_TXT_REMPLIR", "You are customer? Fill your transport demand in seconds and submit it to our well-known shippers.");
define("_TXT_RECEVOIR", "As a shipper, receive a list of ads that can be answered in a few clicks . A quick way to put you in touch with a customer.");
define("_TXT_CHOISIR", "Surely you will receive multiple estimates for your requests for offers. Choose the most affordable estimate or the one that best suits your needs. Once you have chosen, prepare your boxes, the shipper is on its way to help!");


/*
 * Traduction CGV
 */
define("_CGV", "Terms & conditions");
define("_CGV_APPLICATION", "Scope of applications"); //
define("_CGV_COMMANDE", "Order");
define("_CGV_CONCLUSION", "Conclusion of Contract");
define("_CGV_PRIX", "Price");
define("_CGV_LIVRAISON", "Delivery");
define("_CGV_EXPEDITION", "Shipping and risks");
define("_CGV_RESERVE", "Retention of title");
define("_CGV_PAIEMENT", "Payment");
define("_CGV_GARANTIE", "Guarantee");


?>