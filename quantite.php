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
	<link type="text/css" rel="stylesheet" href="Materialize/css/materialize.min.css"  media="screen"/>
  <!-- Css perso -->
	<link type="text/css" rel="stylesheet" href="Materialize/css/style.css"/>
  <!-- lancement du jquery pour que les scripts passent -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="Materialize/js/materialize.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Quantité</title>
</head>
<body>
  <div class="container">
     <h1> Quantité nécessaire</h1> 

      <form method="POST" action="traitement4.php">
    <?php
      $animal           = $_SESSION['mysql_result_animal']; 
      $nom              = $_SESSION['mysql_result_type_elec']; 
      $longueur         = $_SESSION['mysql_result_distance']; 
      $type             = $_SESSION['mysql_result_veget']; 
      $electrificateur  = $_SESSION['electrificateur'];
      $typeconducteur   = $_SESSION['conduc'];
      $fils             = $_SESSION['fil'];
      $ruban            = $_SESSION['ruban'];
      $filet            = $_SESSION['filet'];
      $corde            = $_SESSION['corde'];
      if (isset($_POST['piquet'])) {
        $piquet = $_POST['piquet'];
      }
      if (isset($_POST['cable'])) {
       $cable = $_POST['cable'];
      }
      if (isset($_POST['isocord'])) {
       $isocord = $_POST['isocord'];
      }
       if (isset($_POST['isofil'])) {
       $isofil = $_POST['isofil'];
      }
       if (isset($_POST['accefil'])) {
       $accefil = $_POST['accefil'];
      }
       if (isset($_POST['isorub'])) {
       $isorub = $_POST['isorub'];
      }
      if (isset($_POST['accerub'])) {
       $accerub = $_POST['accerub'];
      }
      if (isset($_POST['acceentre'])) {
       $acceentre = $_POST['acceentre'];
      }
      if (isset($_POST['testeur'])) {
       $testeur = $_POST['testeur'];
      }
      echo "<p align='center'>";
      echo "<center>Votre animal à garder : <b>".$animal."</b>";
      echo "<br>";
      echo "Votre type d'energie : <b>".$nom."</b>";
      echo "<br>";
      echo "Votre distance : <b>".$longueur." km</b>";
      echo "<br>";
      echo "Votre type de végétation : <b>".$type."</b>";
      echo "<br>";
      echo "Votre electrificateur : <b>".$electrificateur."</b>";
      echo "<br>";
      echo "Votre type de conducteur : <b>".$typeconducteur."</b>";
      echo "<br>";
      echo "</center>";
      echo "</p>";
      ?>

        <table class="centered">
          <thead> 
            <tr>
              <th id="desi" ><b>Désignation</b></th>
              <th id="quant">Quantité</th>
            </tr>
          </thead>  
          <tbody>
      <?php

        if(!empty($fils)){
      echo "<tr>";
      echo "<td header='designation'>";  
      echo "Votre fil : <b>".$fils."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantitefil' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

        if(!empty($ruban)){
      echo "<tr>";
      echo "<td header='designation'>";  
      echo "Votre ruban : <b>".$ruban."</b> ";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantiteruban' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

        if(!empty($filet)){
      echo "<tr>";
      echo "<td header='designation'>";   
      echo "Votre filet : <b>".$filet."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantitefilet' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

        if(!empty($corde)){
      echo "<tr>";
      echo "<td header='designation'>";
      echo "Votre corde : <b>".$corde."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantitecorde' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

        if(!empty($piquet)){
      echo "<tr>";
      echo "<td header='designation'>";  
      echo "Votre type de piquet terre : <b>".$piquet."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantitepiquet' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

        if(!empty($cable)){
      echo "<tr>";
      echo "<td header='designation'>";   
      echo "Votre cable haute tension : <b>".$cable."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantitecable' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

        if(!empty($isocord)){
      echo "<tr>";
      echo "<td header='designation'>";   
      echo "Votre isolateur pour corde : <b>".$isocord."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantiteisocord' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

        if(!empty($isofil)){
      echo "<tr>";
      echo "<td header='designation'>";   
      echo "Votre isolateur pour fil : <b>".$isofil."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantiteisofil'  type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

       if(!empty($accefil)){
      echo "<tr>";
      echo "<td header='designation'>";   
      echo "Vos accesoires pour fil : <b>".$accefil."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantiteaccefil' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

        if(!empty($isorub)){
      echo "<tr>";
      echo "<td header='designation'>";   
      echo "Votre isolateur pour ruban : <b>".$isorub."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantiteisorub' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

        if(!empty($accerub)){
      echo "<tr>";
      echo "<td header='designation'>";   
      echo "Vos accesoires pour ruban : <b>".$accerub."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantiteaccerub' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      }

        if(!empty($acceentre)){
      echo "<tr>";
      echo "<td header='designation'>";   
      echo "Votre accessoire entrée : <b>".$acceentre."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantiteaccentre' type='number'min='0'>";
      echo "</td>";
      echo "</tr>";
      } 

        if(!empty($testeur)){
      echo "<tr>";
      echo "<td header='designation'>";   
      echo "Votre testeur : <b>".$testeur."</b>";
      echo "</td>";
      echo "<td header='quant'>";
      echo "<input name='quantitetest' type='number'min='0' max='1'></center>";
      echo "</td>";
      echo "</tr>";
      }
      
      if(isset($_POST['piquet'])){
      $_SESSION['piquet']=$_POST['piquet'];
      }

      if(isset($_POST['cable'])){
      $_SESSION['cable']=$_POST['cable'];
      }

      if(isset($_POST['isocord'])){
      $_SESSION['isocord']=$_POST['isocord'];
      }

      if(isset($_POST['isofil'])){
      $_SESSION['isofil']=$_POST['isofil'];
      }

      if(isset($_POST['accefil'])){
      $_SESSION['accefil']=$_POST['accefil'];
      }

      if(isset($_POST['isorub'])){
      $_SESSION['isorub']=$_POST['isorub'];
      }

      if(isset($_POST['accerub'])){
      $_SESSION['accerub']=$_POST['accerub'];
      }

      if(isset($_POST['acceentre'])){
      $_SESSION['acceentre']=$_POST['acceentre'];
      }
      
      if(isset($_POST['testeur'])){
      $_SESSION['testeur']=$_POST['testeur'];
      }
    ?>
          </tbody>
        </table>
        <div class="button"> 
          <button class="btn waves-effect waves-light green" type="submit" name="resultat" >
            <i class="material-icons right"></i>Devis
          </button>
        </div> 
      </form>
  </div>
</body> 
</html> 