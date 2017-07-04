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

  <title>Conducteur</title>
</head>
<body>  
   <div class="container">
    <strong>  <h1> Conducteur</h1> </strong>
    <form method="POST" action="traitement3.php">
      <h2>Conducteur possible</h2>               
  <?php 
   $conductorResults = $_SESSION['mysql_result_conducteur'];    
    echo '<div >';  
    echo '<h3>Les differents Conducteur  </h3>';   
    echo '</div>';  
     for ($i = 0; $i < count($conductorResults); $i++) {
    echo '<div id="centrage">'; 
  
      if(!empty($conductorResults[$i]['fil'])){
    echo '<ul> ';
    echo '<li> ';
    echo '<input type="radio" name="fils" value="' . $conductorResults[$i]['fil'] . '" id="' .$conductorResults[$i]['fil'] . '" />';
    echo '<label class="label-radio" for="' . $conductorResults[$i]['fil'] . '">' . $conductorResults[$i]['fil'] . '</label>';
    echo '</li>';  
    echo '</ul>';
    }
    
      if (!empty($conductorResults[$i]['ruban'])) {
    echo '<ul>';
    echo '<li>';  
    echo '<input type="radio" name="ruban" value="' . $conductorResults[$i]['ruban'] . '" id="' .$conductorResults[$i]['ruban'] . '" />';
    echo '<label class="label-radio" for="' . $conductorResults[$i]['ruban'] . '">' . $conductorResults[$i]['ruban'] . '</label>';
    echo '</li>';  
    echo '</ul>'; 
    } 

      if (!empty($conductorResults[$i]['filet'])) {
    echo '<ul>';
    echo '<li>';  
    echo '<input type="radio" name="filet" value="' . $conductorResults[$i]['filet'] . '" id="' .$conductorResults[$i]['filet'] . '" />';
    echo '<label class="label-radio" for="' . $conductorResults[$i]['filet'] . '">' . $conductorResults[$i]['filet'] . '</label>';
    echo '</li>';  
    echo '</ul>';
    }
   
      if (!empty($conductorResults[$i]['corde'])) { 
    echo '<ul>';
    echo '<li>';
    echo '<input type="radio" name="corde" value="' . $conductorResults[$i]['corde'] . '" id="' .$conductorResults[$i]['corde'] . '" />';
    echo '<label class="label-radio" for="' . $conductorResults[$i]['corde'] . '">' . $conductorResults[$i]['corde'] . '</label>';
    echo '</li>';  
    echo '</ul>'; 
    } 
    
    echo '</div>';  
    
      } 
      ?> 
                          
        <div class="button"> 
          <button class="btn waves-effect waves-light green" type="submit" name="conduc" > 
            <i class="material-icons right"></i>Accessoires 
          </button>
        </div>   
    
    </form> 
  </div>

</body>
