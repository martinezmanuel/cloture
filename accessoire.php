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

	<title>Accessoires</title>
</head>
<body>
	<div class="container">
  <strong>  <h1> Accessoires</h1> </strong>
    <form method="POST" action="quantite.php">
      <h2>Accessoires suivant vos choix</h2>
            <?php 
              
              $piquet     = $_SESSION['mysql_result_piquet'] ;
              $cable      = $_SESSION['mysql_result_cable']  ;
              $isocord    = $_SESSION['mysql_result_isocord']  ;
              $isofil     = $_SESSION['mysql_result_isofil']  ;
              $accefil    = $_SESSION['mysql_result_accefil']  ;
              $isorub     = $_SESSION['mysql_result_isorub']   ;
              $accerub    = $_SESSION['mysql_result_accerub']  ;
              $acceentre  = $_SESSION['mysql_result_acceentre']  ;
              $testeur    = $_SESSION['mysql_result_testeur']  ;
              
            echo '<ul class="collapsible" data-collapsible="accordion">';
            echo '<li>';
             if(!empty($piquet[0]['piquet'])){ 
              echo'<div class="collapsible-header">';
              echo '<h3> Piquet </h3>';
              echo '</div>';
              for ($i = 0; $i < count($piquet); $i++){
              echo '<div class="collapsible-body" id="centrage">';
              echo '<ul>';
              echo '<li>' ;
              echo '<input type="radio" name="piquet" value="' . $piquet[$i]['piquet']. '" id="' . $piquet[$i]['piquet']. '" />';
              echo '<label class="label-radio" for="' . $piquet[$i]['piquet']. '">' . $piquet[$i]['piquet']. '</label>';
              echo '</li>';  
              echo '</ul>';
              echo '</div>';
                }
              }
              echo '</li>';
              echo '<li>';

              if(!empty($cable[0]['cable'])){
              echo'<div class="collapsible-header">';  
              echo '<h3> Cable haute tension </h3>';
              echo '</div>';
              for ($i = 0; $i < count($cable); $i++){
              echo '<div class="collapsible-body" id="centrage">';  
              echo '<ul>';
              echo '<li>';
              echo '<input type="radio" name="cable" value="' . $cable[$i]['cable']. '" id="' . $cable[$i]['cable']. '" />';
              echo '<label class="label-radio" for="' . $cable[$i]['cable']. '">' . $cable[$i]['cable']. '</label>';
              echo '</li>';
              echo '</ul>';
              echo '</div>';
                }
              }
              echo '</li>';
              echo '<li>';

              if(!empty($isocord[0]['isocord'])){
              echo'<div class="collapsible-header">';   
              echo '<h3> Isolateurs corde </h3>';
              echo '</div>';
              for ($i = 0; $i < count($isocord); $i++){
              echo '<div class="collapsible-body" id="centrage">';  
              echo '<ul>';
              echo '<li>';
              echo '<input type="radio" name="isocord" value="' . $isocord[$i]['isocord']. '" id="' . $isocord[$i]['isocord']. '" />';
              echo '<label class="label-radio" for="' . $isocord[$i]['isocord']. '">' . $isocord[$i]['isocord']. '</label>';
              echo '</li> ';
              echo '</ul>';
              echo '</div>';
                }
              }
              echo '</li> ';
              echo '<li>';

              if(!empty($isofil[0]['isofil'])){
              echo'<div class="collapsible-header">';   
              echo '<h3> Isolateurs fil </h3>';
              echo '</div>';
              for ($i = 0; $i < count($isofil); $i++){
              echo '<div class="collapsible-body" id="centrage">';   
              echo '<ul>';
              echo '<li>';
              echo '<input type="radio" name="isofil" value="' . $isofil[$i]['isofil']. '" id="' . $isofil[$i]['isofil']. '" />';
              echo '<label class="label-radio" for="' . $isofil[$i]['isofil']. '">' . $isofil[$i]['isofil']. '</label>';
              echo '</li>';
              echo '</ul>';
              echo '</div>';
                }
              }
              echo '</li>';
              echo '<li>';

              if(!empty($accefil[0]['accefil'])){
              echo '<div class="collapsible-header">';  
              echo '<h3> Accessoires fil </h3>';
              echo '</div>';
              for ($i = 0; $i < count($accefil); $i++){
              echo '<div class="collapsible-body" id="centrage">';  
              echo '<ul>';
              echo '<li>';
              echo '<input type="radio" name="accefil" value="' . $accefil[$i]['accefil']. '" id="' . $accefil[$i]['accefil']. '" />';
              echo '<label class="label-radio" for="' . $accefil[$i]['accefil']. '">' . $accefil[$i]['accefil']. '</label>';
              echo '</li>';
              echo '</ul>';
              echo '</div>';
                }
              }  
              echo '</li>';
              echo '<li>';

              if(!empty($isorub[0]['isorub'])){
              echo '<div class="collapsible-header">';  
              echo '<h3> Isolateurs ruban </h3>';
              echo '</div>';
              for ($i = 0; $i < count($isorub); $i++){
              echo '<div class="collapsible-body" id="centrage">';  
              echo '<ul>';
              echo '<li>';
              echo '<input type="radio" name="isorub" value="' . $isorub[$i]['isorub']. '" id="' . $isorub[$i]['isorub']. '" />';
              echo '<label class="label-radio" for="' . $isorub[$i]['isorub']. '">' . $isorub[$i]['isorub']. '</label>';
              echo '</li>';
              echo '</ul>';
              echo '</div>';
                }
              }
              echo '</li>';
              echo '<li>';
              
              if(!empty($accerub[0]['accerub'])){ 
              echo '<div class="collapsible-header">';   
              echo '<h3> Accessoires ruban </h3>';
              echo '</div>';
              for ($i = 0; $i < count($accerub); $i++){
              echo '<div class="collapsible-body" id="centrage">';  
              echo '<ul>';
              echo '<li>';
              echo '<input type="radio" name="accerub" value="' . $accerub[$i]['accerub']. '" id="' . $accerub[$i]['accerub']. '" />';
              echo '<label class="label-radio" for="' . $accerub[$i]['accerub']. '">' . $accerub[$i]['accerub']. '</label>';
              echo '</li>';
              echo '</ul>';
              echo '</div>';
                }
              }
              echo '</li>';
              echo '<li>';

              if(!empty($acceentre[0]['acceentre'])){
              echo '<div class="collapsible-header">';  
              echo '<h3> Accessoires entrée </h3>';
              echo '</div>';
              for ($i = 0; $i < count($acceentre); $i++){
              echo '<div class="collapsible-body" id="centrage">';  
              echo '<ul>'; 
              echo '<li>';
              echo '<input type="radio" name="acceentre" value="' . $acceentre[$i]['acceentre']. '" id="' . $acceentre[$i]['acceentre']. '" />';
              echo '<label class="label-radio" for="' . $acceentre[$i]['acceentre']. '">' . $acceentre[$i]['acceentre']. '</label>';
              echo '</li> ';
              echo '</ul>';
              echo '</div>';
                }
              }
              echo '</li>';
              echo '<li>';

              if(!empty($testeur[0]['testeur'])){ 
              echo '<div class="collapsible-header">';  
              echo '<h3> Testeur </h3>';
              echo '</div>';
              for ($i = 0; $i < count($testeur); $i++){
              echo '<div class="collapsible-body" id="centrage">';  
              echo '<ul>';
              echo '<li>';
              echo '<input type="radio" name="testeur" value="' . $testeur[$i]['testeur']. '" id="' . $testeur[$i]['testeur']. '" />';
              echo '<label class="label-radio" for="' . $testeur[$i]['testeur']. '">' . $testeur[$i]['testeur']. '</label>';
              echo '</li>';
              echo '</ul>';
              echo '</div>';
                }
              }
              echo '</li>'; 
              echo '</ul>';
             
            ?>
         
      <div class="button">      
        <button class="btn waves-effect waves-light green" type="submit" name="peri" > 
          <i class="material-icons right"></i>Quantité nécessaire
        </button>
      </div>
    </form>
  </div>  
	
</body>