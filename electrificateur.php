<?php
session_start();
error_reporting(E_ALL);

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
  <script type="text/javascript" src="Materialize/js/materialize.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title>Electrificateur</title>
</head>
<body>	 
  <div class="container">
    <strong>  <h1>Choix de l'électrificateur</h1> </strong>
    <form method="POST" action="traitement1.php">      
      
      <?php 
        $electrificatorResults = $_SESSION['mysql_result_elec'];

  
          for ($i = 0; $i < count($electrificatorResults); $i++) {
          echo '<div id="centrage">';   
          echo '<ul>'; 
          echo '<li>'; 
          echo '<input required type="radio" name="electriseur" value="'.$electrificatorResults[$i]['electriseur'].'" id="'.$electrificatorResults[$i]['electriseur'].'" />';
          echo '<label class="label-radio" for="'.$electrificatorResults[$i]['electriseur'].'">'.$electrificatorResults[$i]['electriseur'].'</label>';
          echo '</li>';
          echo '</ul>';
          echo '</div>';
      } 
      ?>        
      <div class="button"> 
        <button class="btn waves-effect waves-light green" type="submit" name="elec" > 
          <i class="material-icons right"></i>Type de conducteur
        </button>
      </div> 
    </form>
  </div>   
</body>  
</html>