 <?php
 session_start();
 error_reporting(E_ALL);
 // Récupération des données des tableaux crée précedement
 $resultat=$_SESSION['arrayResultat'];
 $prixquanti=$_SESSION['arrayPrix'];
 $prixtotal=$_SESSION['total'];

//Récuperation des valeurs pour récapitulatif
  $animal          = $_SESSION['mysql_result_animal'] ; 
  $type_elec       = $_SESSION['mysql_result_type_elec'] ; 
  $longueur        = $_SESSION['mysql_result_distance'] ; 
  $type            = $_SESSION['mysql_result_veget'] ; 

 // Traitement des tableaux récupéré
// premier tableau avec le nom et le prix total
 $nom='';
 $total='';
 foreach ($resultat as $key => $value) {
  $nom    .= "$key<br>";
  $total  .= "$value<br>";
 }

// second tableau avec le prix unitaire et la quantité
 $prixunit='';
 $quanti='';
 foreach ($prixquanti as $key => $value) {
   $prixunit  .="$key<br>";
   $quanti    .="$value<br>";
 }

  // S'il y des données de postées
if ($_SERVER['REQUEST_METHOD']=='POST') {
  // Code PHP pour traiter l'envoi de l'email
 
  $nombreErreur = 0; // Variable qui compte le nombre d'erreur
  // Définit toutes les erreurs possibles
  if (!isset($_POST['email'])) { // Si la variable "email" du formulaire n'existe pas (il y a un problème)
    $nombreErreur++; // On incrémente la variable qui compte les erreurs
    $erreur1 = '<p>Il y a un problème avec la variable "email".</p>';
  } else { // Sinon, cela signifie que la variable existe (c'est normal)
    if (empty($_POST['email'])) { // Si la variable est vide
      $nombreErreur++; // On incrémente la variable qui compte les erreurs
      $erreur2 = '<p>Vous avez oublié de donner votre email.</p>';
    } else {
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $nombreErreur++; // On incrémente la variable qui compte les erreurs
        $erreur3 = '<p>Cet email ne ressemble pas un email.</p>';
      }
    }
  }
 
  if (!isset($_POST['message'])) {
    $nombreErreur++;
    $erreur4 = '<p>Il y a un problème avec la variable "message".</p>';
  } else {
    if (empty($_POST['message'])) {
      $nombreErreur++;
      $erreur5 = '<p>Vous avez oublié de donner un message.</p>';
    }
  }    // (3) Ici, il sera possible d'ajouter plus tard un code pour vérifier un captcha anti-spam.
 
  if ($nombreErreur==0) { 
     
      // Récupération des variables et sécurisation des données
      $name    = htmlentities($_POST['name']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
      $email   = htmlentities($_POST['email']);
      $message = htmlentities($_POST['message']);
     
      // Variables concernant l'email
      // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
      $headers = 'MIME-Version: 1.0'."\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8'."\r\n";
      $headers .= 'Demande devis clotures'."\r\n";
      $destinataire = 'm.martinez@agram.fr,'.$email.''; // Adresse email du webmaster (à personnaliser)      
      $sujet = 'Demande de devis clotures'; // Titre de l'email
      $contenu = 
      '<html>
        <head>
              <title ></title>
        </head>
        <body>
          <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                        <tr>
                            <td align="center" valign="top">
                                
                              <h1 style="font-style:italic;font-size:2em;">Votre devis</h1>
                                    <p><strong>Nom</strong> : '.$name.'</p>
                                    <p><strong>Email</strong> : '.$email.'</p>
                                    <p><strong>Message</strong> : ' .$message.'</p>
                                <h2 style="font-style:italic;font-size:1.5em;">Récapitulatif</h2>

                                    <p>Votre animal à garder : <b>'.$animal.'</b> </p>      
                                    <p>Votre type d\'energie : <b>'.$type_elec.'</b></p>
                                    <p>Votre distance : <b>'.$longueur.' km</b></p>
                                    <p>Votre type de végétation : <b>'.$type.'</b></p>
      
    
                                  <h3 style="font-style:italic;font-size:1em;">Tableau de la liste à fournir </h3>
                    <table style="border: 1px solid #368BC1;text-align: center;">
                      <thead> 
                        <tr style="border: 1px solid #368BC1;text-align: center;">
                          <th id="nom" style="border: 1px solid #368BC1;text-align: center;">
                            <b>Nom</b>
                          </th>
                          <th id="prix-unitaire" style="border: 1px solid #368BC1;text-align: center;">
                            <b>Prix Unitaire</b>
                          </th>
                          <th id="quantite" style="border: 1px solid #368BC1;text-align: center;">
                            <b>Quantité</b>
                          </th>
                          <th id="prix-total" style="border: 1px solid #368BC1;text-align: center;">
                            <b>Prix Total</b>
                          </th>
                        </tr>
                      </thead> 
                      <tbody> 
                        <tr style="border: 1px solid #368BC1;text-align: center;">
                          <td headers="nom" style="border: 1px solid #368BC1;text-align: center;">'.$nom.'</td>
                          <td headers="prix-unitaire" style="border: 1px solid #368BC1;text-align: center;">'.$prixunit.'</td>
                          <td headers="quantite" style="border: 1px solid #368BC1;text-align: center;">'.$quanti.'</td>
                          <td headers="prix-total" style="border: 1px solid #368BC1;text-align: center;"> '.$total.'</td>
                        </tr>
                      </tbody>
                    </table>
                                    <p>Total de votre devis : <b>'.$prixtotal.' </b> HT</p>
                          </td>
                          </tr>
                    </table>
                </td>
            </tr>
          </table>
        </body>
      </html>'; 
// Contenu du message de l'email (en HTML)
     
      
     
      // Envoyer l'email
      mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
      echo '<h2>Votre message a été envoyé!</h2>'; // Afficher un message pour indiquer que le message a été envoyé
      // (2) Fin du code pour traiter l'envoi de l'email
      } 

    else { // S'il y a un moins une erreur
    echo '<div style="border:1px solid #000000; padding:5px;">';
    echo '<p style="color:#000000;">Désolé, il y a eu '.$nombreErreur.' erreur(s). Voici le détail des erreurs:</p>';
    if (isset($erreur1)) echo '<p>'.$erreur1.'</p>';
    if (isset($erreur2)) echo '<p>'.$erreur2.'</p>';
    if (isset($erreur3)) echo '<p>'.$erreur3.'</p>';
    if (isset($erreur4)) echo '<p>'.$erreur4.'</p>';
    if (isset($erreur5)) echo '<p>'.$erreur5.'</p>';
    // (4) Ici, il sera possible d'ajouter un code d'erreur supplémentaire si un captcha anti-spam est erroné.
    echo '</div>';
  }
}
   
      
    
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <meta name="author" content="Martinez Manuel" />
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Css Materialize -->
	<link type="text/css" rel="stylesheet" href="Materialize/css/materialize.min.css"  media="screen,projection"/>
  <!-- Css perso -->
	<link type="text/css" rel="stylesheet" href="Materialize/css/style.css"/>
  <!-- lancement du jquery pour que les scripts passent -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Demande devis</title>	
</head>
<body>
	<div class="container">
		<strong><h1>Formulaire de demande de devis</h1></strong>
		<div class="row" id="centrage2">
         <form class="col s12" action="demande-devis.php" method="post">
            <div class="row">
               <div class="input-field col s12">
                  	<i class="material-icons prefix">account_circle</i>
                  	<input placeholder="Nom" name="name" id="inputname" pattern="([a-zA-Z\s]){1,30}" type="text" class="form-control"value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>" required>
                  	<label for="inputname"></label>
               </div>               
            </div>
            <div class="row" >
               <div class="input-field col s12">
               	 	<i class="material-icons prefix">mode_edit</i>
                  	<input placeholder="Email" name="email" id="inputemail" type="email" class="validate" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>" required>
                  	<label for="inputemail"></label>
               </div>
            </div>			
            <div class="row" >
               <div class="input-field col s12">
               		<i class="material-icons prefix">message</i>
                  	<input placeholder="Votre demande" name="message" id="inputmessage" type="text"value="<?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?>" required >
                  	<label for="inputmessage"></label>
               </div>
            </div>
            <div class="button">
              <input class="btn waves-effect waves-light green" id="return" type="button" onclick="location.href='index.php';" value="retour accueil" />
              <button class="btn waves-effect waves-light green" type="submit">envoyer<i class="material-icons right">send</i></button>
            </div>
        </form>
      </div>
	</div>
</body>
</html>