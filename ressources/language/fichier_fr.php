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
define("_ES_PRICE","Prix devisé");


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
define("_AD_DETAILS", "Détails de l'annonce");
define("_AD_LIST", "Liste des annonces");
define("_AD_DELETE", "Supprimer l'annonce");
define("_AD_DELETED", "Annonce supprimée");
define("_AD_CREATE", "Créer une annonce");
define("_AD_NEW", "Nouvelle annonce");


/*
 * Traduction des pages
 * 
 * * *
 * 
 * Traduction de PAGES/HOME.PHP
 */
define("_LANGUAGE","Langues");
define("_LOGIN", "Login");
define("_REGISTER", "S'enregistrer");
define("_I_AM_A_SHIPPER", "Je suis un transporteur");
define("_I_AM_A_CUSTOMER", "Je suis un client");
define("_REGISTER_FOR_SHIPPER", "Créer un compte transporteur");
define("_REGISTER_FOR_CUSTOMER", "Créer un compte client");
define("_MR", "Monsieur");
define("_MS", "Madame");
define("_NIP", "NPA");
define("_CREATE", "Créer");
define("_ALREADY_CLIENT", "Déjà client ?");
define("_ALREADY_CLIENT_TEXT", "Que vous soyez un transporteur ou un demandeur de transport, accéder à votre espace personnel afin de profiter des incroyables services offerts par TEEMW !");
define("_SUBSCRIBE_SHIPPER", "Vous êtes transporteur ?");
define("_SUBSCRIBE_SHIPPER_TEXT", "N'hésitez plus et inscrivez-vous pour un tarif avantageux afin de faire valoir vos service auprès de nombreux demandeur qui postent quotidiennement des requêtes !");
define("_SUBSCRIBE_CUSTOMER", "A la recherche d'un transporteur ?");
define("_SUBSCRIBE_CUSTOMER_TEXT", "Créer un compte gratuitement et accéder à un espace dédié où vous pourrez poster vos demandes et recevrez des devis dans les plus brefs délais !");
define("_OUR_SERVICES", "Nos services");
define("_PRESTATION", "Prestations");
define("_GARANTY", "Garantie");
define("_DEVIS", "Devis");
define("_LEARN_MORE", "EN SAVOIR PLUS");
define("_FILL", "Remplir");
define("_RECIEVE", "Recevoir");
define("_CHOOSE", "Choisir");

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
 * Traduction de tools/business/infoUser.php
 */
define("_ACCEPTE", "Accepté(s) :");
define("_REFUSE", "Refusé(s)");
define("_UPDATE_INFO", "Mise à jour des coordonnées :");
define("_DATE", "Date");

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
 * Traduction de pages/inputEstimate.php
 */
define("_SAISIR_DEVIS", "Saisir un devis");
define("_PRIX_PROPOSE", "Veuillez saisir un prix pour votre devis");
define("_PAS_D_ANNONCE", "Il n'y a pas d'annonce");
define("_PROPOSER_UN_DEVIS", "Soumettre un devis");
define("_MANQUE_PRIX", "Vous devez indiquer un prix");
define("_DEVIS_ENREGISTRE", "Le devis est enregistré");

/*
 * Traduction de check_info_user.php
 */
define("_MSG_CITY", "Cette ville n'est pas répertoriée.");
define("_MSG_SETSOCT", "Ajouter une société");
define("_MSG_ERROR_EMAIL", "L'e-mail n'est pas correct.");
define("_MSG_SETMAIL", "Ajouter un e-mail");
define("_MSG_SETCOUNTRY", "Ajouter un pays");
define("_MSG_SETPOSTCODE", "Ajouter un code postal");
define("_MSG_SETCITY", "Ajouter une ville");
define("_MSG_SETADDRESS", "Ajouter une addresse");
define("_MSG_SETTITLE", "Ajouter un titre");
define("_MSG_SETPASSWORD", "Ajouter un mot de passe");
define("_MSG_SETLNAME", "Ajouter un nom de famille");
define("_MSG_SETFNAME", "Ajouter un prénom");
define("_MSG_UPDATE_SUCCESS", "La mise à jour est réussie. Décconectez-vous, puis recconectez-vous pour accèder à la mise à jour.");
define("_MSG_REGISTRATION_SUCCESS","Enregistrement réalisé avec succès.");
define("_MSG_MAIL_PASSWORD_INCORRECT", "E-mail ou mot de passe incorrect !");
define("_MSG_EMAIL_USED","E-mail déjà utilisé !");


/*
 * Traduction de info_user.php
 */
define("_INFO_USER", "Informations du compte");
define("_CHANGE_INFO_USER", "Modifier les informations du compte");


/*
 * Traduction de infoAdmin.php
 */
define("_ESTIMATE_NUMBER", "Numéro de devis");
define("_ADVERTISER", "Annonceur");
define("_SHIPPER", "Transporteur");
define("_PRICE", "Prix");
define("_NO_ESTIMATE", "Pas de devis à valider");
define("_ESTIMATE_TO_VALIDATE", "Devis à valider");
define("_VALIDATE", "Valider");
define("_SHIPPER_SUBSCRIPTION_FINISHED", "Abonnements de transporteur terminés");
define("_SHIPPER_SUBSCRIPTION_END", "Abonnements de transporteur arrivant à échéance");
define("_THERE_IS_NO_ONE", "Il n'y en a pas");
define("_ONE_MORE_YEAR", "Prolonger d'un an");


/*
 * Traduction des buttons
 */
define("_AFFICHE_DEVIS", "Affichez les devis");
define("_SELECT_TRANSPORTEUR", "Choisir ce transporteur");
define("_OK", "Ok");
define("_INFO_TRANSPORTEUR", "Infos du transporteur");
define("_INFO_CUSTOMER", "Infos du client");


/*
 * Traduction home.php
 */
define("_TXT_PRESTATIONS", "Vous avez un piano à transporter ? Vous êtes un tansporteurs cherchant des clients ?
		<br>TEEMW est le site dont vous avez besoin. Nous réunissons clients et transporteurs.");
define("_TXT_ESTIMATE", "Besoin de transporter de lourds meubles ? Ajoutez une annonce sur notre site !
		<br>Nos partenaires de transport intéressés vont rapidement vous soumettre un devis.");
define("_TXT_GARANTIE", "Des transporteurs qualifiés à votre service !
		<br>Nos transporteurs ont obtenu notre sceau de qualité. Ils sont certifiés TeemW et se réjouissent de répondre à vos demandes.");

define("_TXT_REMPLIR", "Vous êtes clients ? Remplissez votre demande de transport en quelques secondes et soumettez-la à nos transporteurs reconnus.");
define("_TXT_RECEVOIR", "En tant que transporteur, recevez une liste d'annonces auxquelles vous pourrez répondre en quelques clics. Un moyen rapide de vous mettre en relation avec un client.");
define("_TXT_CHOISIR", "Assurément, vous recevrez plusieurs devis pour vos demandes d'offre. Choissisez le devis le plus abordable ou celui qui convient le mieux à vos attentes. Une fois, le devis choisi, préparez vos cartons, le transporteur est en route pour vous aider !");


/*
 * Traduction CGV
 */
define("_CGV", "CGV");
define("_CGV_APPLICATION", "Champ d'application"); //
define("_CGV_COMMANDE", "Commande");
define("_CGV_CONCLUSION", "Conclusion du contrat");
define("_CGV_PRIX", "Prix");
define("_CGV_LIVRAISON", "Livraison");
define("_CGV_EXPEDITION", "Expédition et risques");
define("_CGV_RESERVE", "Réserve de propriété");
define("_CGV_PAIEMENT", "Paiement");
define("_CGV_GARANTIE", "Garantie");

?>