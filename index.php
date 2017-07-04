<?php 
session_start();
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

	<title>Application</title>
</head>
<body>
    <script type="text/javascript" >
    // pour pouvoir ouvrir ou fermer l'acordéon
    $(document).ready(function(){
      $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
    });
    </script>
    <script>
    $(document).ready(function() {
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
    });
    </script>

<div class="container">
	<strong>  <h1>Choisir sa cloture</h1> </strong>
    <form method="POST" action="traitement.php">
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header">
            <h2>Animal à garder </h2>
          </div>
          <div class="collapsible-body" id="centrage">
            <ul>
              <li>        
                <input value="cheval" name="animaux" type="radio" id="cheval"/>
                  <label for="cheval">Cheval </label>
              </li>          
              <li>  
                <input value="vache" name="animaux" type="radio" id="vache"  /> 
                  <label for="vache"> Vache </label>
              </li>
              <li>        
                <input value="gibier" name="animaux" type="radio" id="gibier" />  
                  <label for="gibier"> Gibier</label> 
              </li> 
              <li>  
                <input value="mouton" name="animaux" type="radio" id="mouton" />   
                  <label for="mouton"> Mouton </label> 
              </li> 
              <li>
                <input value="lapin" name="animaux" type="radio" id="lapin"  />   
                  <label for="lapin"> Lapin </label> 
              </li>              
              <li>
                <input value="volaille" name="animaux" type="radio" id="volaille" />
                  <label for="volaille"> Volaille </label> 
              </li>
              <li>
                <input value="chien" name="animaux" type="radio" id="chien"  />   
                  <label for="chien"> Chien </label> 
              </li>
            </ul>
          </div>
        </li>
        <li>
          <div class="collapsible-header">
            <h2>Alimentation éléctrique</h2>                
          </div>
          <div class="collapsible-body" id="centrage">
            <ul>
              <li>
                <input value="secteur" name="type_electriseur" type="radio" id="secteur"  /> 
                  <label for="secteur" > Secteur </label> 
              </li>
              <li>
                <input type="radio" value="portable" name="type_electriseur"  id="portable"/> 
                  <label for="portable" > Portable </label> 
              </li>
            </ul>            
          </div>
        </li>
        <li>
          <div class="collapsible-header">
            <h2>Longueur de la cloture</h2>
          </div>
          <div class="collapsible-body" id="centrage">
            <ul>  
              <li>              
                <input type="radio" value="inf-1" name="distance" id="inf-1"  /> 
                  <label class="label-radio" for="inf-1"> Inférieur à 1 km </label> 
              </li>
              <li>
                <input type="radio" value="1-5" name="distance" id="1-5" />         
                  <label class="label-radio" for="1-5"> De 1 à 5 km</label>             
              </li>
              <li>
                <input type="radio" value="5-15 " name="distance" id="5-15" /> 
                  <label class="label-radio" for="5-15"> De 5 à 15 km </label> 
              </li>
              <li>            
                <input type="radio" name="distance" value="sup-15" id="sup-15" /> 
                  <label class="label-radio" for="sup-15" > Supérieur à 15 km </label> 
              </li>
            </ul>
          </div>
        </li> 
        <li> 
          <div class="collapsible-header">
            <h2>Vegetation</h2>
          </div>
          <div class="collapsible-body" id="centrage">
            <ul>  
              <li>              
                <input type="radio" value="faible" name="vegetation" id="faible"  /> 
                  <label class="label-radio" for="faible"> Faible </label> 
              </li>
              <li>
                <input type="radio" value="moyenne" name="vegetation" id="moyenne"/>        
                  <label class="label-radio" for="moyenne"> Moyenne</label>            
              </li>
              <li>
                <input type="radio" value="importante " name="vegetation" id="importante" /> 
                  <label class="label-radio" for="importante"> Importante </label> 
              </li>
            </ul>
          </div>
        </li> 
      </ul>
      <div class="button"> 
        <button class="btn waves-effect waves-light green" type="submit" name="resultat" >
          <i class="material-icons right"></i>Votre éléctrificateur
        </button>
      </div> 
    </form>  
  </div>
</body>
</html>