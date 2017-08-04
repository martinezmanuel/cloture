<?php
session_start();
error_reporting(E_ALL);

$dataelec     = $_SESSION['data_elec'];
$datafil      = $_SESSION['data_fil'];
$datarub      = $_SESSION['data_ruban'];
$datacord     = $_SESSION['data_corde'];
$datafilet    = $_SESSION['data_filet'];
$datapiquet   = $_SESSION['data_piquet'];
$datacable    = $_SESSION['data_cable'];
$datisocord   = $_SESSION['data_isocord'];
$dataisofil   = $_SESSION['data_isofil'];
$dataccefil   = $_SESSION['data_accefil'];
$dataisorub   = $_SESSION['data_isorub'];
$dataccerub   = $_SESSION['data_accerub'];
$dataccentre  = $_SESSION['data_accentre'] ;
$datatest     = $_SESSION['data_test'] ;

$quantifil      = $_SESSION['quantitefil'];
$quantiruban    = $_SESSION['quantiteruban'];
$quanticorde    = $_SESSION['quantitecorde'];
$quantifilet    = $_SESSION['quantitefilet'];
$quantipiquet   = $_SESSION['quantitepiquet'];
$quanticable    = $_SESSION['quantitecable'];
$quantisocord   = $_SESSION['quantiteisocord'];
$quantisofil    = $_SESSION['quantiteisofil'];
$quantiaccefil  = $_SESSION['quantiteaccefil'];
$quantisorub    = $_SESSION['quantiteisorub'];
$quantiaccerub  = $_SESSION['quantiteaccerub'];
$quantiaccentre = $_SESSION['quantiteaccentre'];
$quantitest     = $_SESSION['quantitetest'];


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

  <title>Devis</title>
</head>
<body>  
  <div class="container">

  <h1> Résultat de votre demande </h1>
  
    <table class="centered">
      <thead> 
      <tr>
        <th id="nom" ><b>Nom</b></th>
        <th id="desi" ><b>Designation</b></th>
        <th id="prix">Prix</th>
        <th id="quant">Quantité</th>
        <th id="tot">Total</th>
      </tr>
      </thead>  
      <tbody>
        

<?php 

if(!empty($dataelec)){ 
    echo '<tr>';  
    echo '<td headers="nom">'; 
    echo 'Electrificateur';
    echo '</td>';  
    echo '<td headers="desi">'; 
    echo $dataelec['0']['electriseur'];
    echo '</td>';
    echo '<td headers="prix">';
    echo $dataelec['0']['prixelec'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantielec = 1;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalelec = $dataelec['0']['prixelec'] * $quantielec;
    echo '</td>';
    echo '</tr>';
    $arrayElec = array_combine(array($dataelec['0']['electriseur']),array($totalelec));
    $arrayPriQuantiElec = array_combine(array($dataelec['0']['prixelec']), array($quantielec));
  }
  
 if(!empty($datafil) && $quantifil>0 ){ 
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Fil';
    echo '</td>';  
    echo '<td headers="desi">'; 
    echo $datafil['0']['fil'];
    echo '</td>';
    echo '<td headers="prix">';
    echo $datafil['0']['prixfil'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantifil;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalfil = $datafil['prixfil']*$quantifil;
    echo '</td>';
    echo '</tr>';
    $arrayFil = array_combine(array($datafil['0']['fil']), array($totalfil));
    $arrayPriQuantiFil = array_combine(array($datafil['prixfil']), array($quantifil));
}

elseif (empty($datafil) || $quantifil==0 ) {
    $totalfil = 0 ;
    $arrayFil = array();
    $arrayPriQuantiFil = array();
}

if(!empty($datarub) && $quantiruban>0){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Ruban';
    echo '</td>';   
    echo '<td headers="desi">'; 
    echo $datarub['0']['ruban']; 
    echo '</td>';
    echo '<td headers="prix">';
    echo $datarub['0']['prixruban'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantiruban;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalrub = $datarub['0']['prixruban']*$quantiruban;
    echo '</td>';
    echo '</tr>';
    $arrayRub = array_combine(array($datarub['0']['ruban']), array($totalrub));
    $arrayPriQuantiRub = array_combine(array($datarub['0']['prixruban']), array($quantiruban));
}

elseif (empty($datarub) || $quantiruban==0) {
    $totalrub = 0;
    $arrayRub = array();
    $arrayPriQuantiRub = array();
}

if(!empty($datacord) && $quanticorde>0){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Corde';
    echo '</td>';   
    echo '<td headers="desi">'; 
    echo $datacord['0']['corde'];
    echo '</td>';
    echo '<td headers="prix">'; 
    echo $datacord['0']['prixcorde'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quanticorde;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalcord = $datacord['0']['prixcorde']*$quanticorde;
    echo '</td>';
    echo '</tr>';
    $arrayCord = array_combine(array($datacord['0']['corde']), array($totalcord));
    $arrayPriQuantiCord = array_combine(array($datacord['0']['prixcorde']), array($quanticorde));
}

elseif (empty($datacord) || $quanticorde==0 ) {
    $totalcord = 0;
    $arrayCord = array();
    $arrayPriQuantiCord = array();
}

if(!empty($datafilet)&& $quantifilet>0){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Filet';
    echo '</td>';   
    echo '<td headers="desi">';
    echo $datafilet['0']['filet'];
    echo '</td>';
    echo '<td headers="prix">';   
    echo $datafilet['0']['prixfilet'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantifilet;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalfilet = $datafilet['0']['prixfilet']*$quantifilet;
    echo '</td>';
    echo '</tr>';
    $arrayFilet = array_combine(array($datafilet['0']['filet']), array($totalfilet));
    $arrayQuantiFilet = array_combine(array($datafilet['0']['prixfilet']), array($quantifilet));
}

elseif (empty($datafilet) || $quantifilet==0) {
    $totalfilet = 0;
    $arrayFilet = array();
    $arrayQuantiFilet = array();
}

if(!empty($datapiquet) && $quantipiquet>0){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Piquet terre';
    echo '</td>';   
    echo '<td headers="desi">';  
    echo $datapiquet['0']['piquet'];
    echo '</td>';
    echo '<td headers="prix">';
    echo $datapiquet['0']['prixpiquter'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantipiquet;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalpiquet = $datapiquet['0']['prixpiquter']*$quantipiquet;
    echo '</td>';
    echo '</tr>';
    $arrayPiquet = array_combine(array($datapiquet['0']['piquet']), array($totalpiquet));
    $arrayPriQuantiPiq = array_combine(array($datapiquet['0']['prixpiquter']), array($quantipiquet));
}

elseif (empty($datapiquet) || $quantipiquet==0 ) {
    $totalpiquet = 0;
    $arrayPiquet = array();
    $arrayPriQuantiPiq = array();
}

if(!empty($datacable) && $quanticable>0){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Cable HT';
    echo '</td>';   
    echo '<td headers="desi">'; 
    echo $datacable['0']['cable'];
    echo '</td>';
    echo '<td headers="prix">';  
    echo $datacable['0']['prixcableht'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quanticable;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalcable = $datacable['0']['prixcableht']*$quanticable;
    echo '</td>';
    echo '</tr>';  
    $arrayCable = array_combine(array($datacable['0']['cable']), array($totalcable));
    $arrayPriQuantiCabl = array_combine(array($datacable['0']['prixcableht']), array($quanticable));
}

elseif (empty($datacable)|| $quanticable==0) {
    $totalcable = 0;
    $arrayCable = array();
    $arrayPriQuantiCabl = array();
}

if(!empty($datisocord)&& $quantisocord >0){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Isolateur corde';
    echo '</td>';   
    echo '<td headers="desi">'; 
    echo $datisocord['0']['isocord']; 
    echo '</td>';
    echo '<td headers="prix">';  
    echo $datisocord['0']['prixisocorde'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantisocord;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalisocord = $datisocord['0']['prixisocorde']*$quantisocord;
    echo '</td>';
    echo '</tr>';
    $arrayIsocord = array_combine(array($datisocord['0']['isocord']), array($totalisocord));
    $arrayPriQuantIsocord = array_combine(array($datisocord['0']['prixisocorde']), array($quantisocord));
}

elseif (empty($datisocord)||$quantisocord==0) {
    $totalisocord = 0;
    $arrayIsocord = array();
    $arrayPriQuantIsocord = array();
}

if(!empty($dataisofil) && $quantisofil>0){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Isolateur fil';
    echo '</td>';   
    echo '<td headers="desi">'; 
    echo $dataisofil['0']['isofil']; 
    echo '</td>';
    echo '<td headers="prix">'; 
    echo $dataisofil['0']['prixisofil'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantisofil;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalisofil = $dataisofil['0']['prixisofil']*$quantisofil;
    echo '</td>';
    echo '</tr>';
    $arrayIsofil = array_combine(array($dataisofil['0']['isofil']), array($totalisofil));
    $arrayPriQuantIsofil = array_combine(array($dataisofil['0']['prixisofil']), array($quantisofil));
}

elseif (empty($datisofil) ||$quantisofil==0 ) {
    $totalisofil = 0;
    $arrayIsofil = array();
    $arrayPriQuantIsofil = array();
}

if(!empty($dataccefil) && $quantiaccefil>0){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Accesoire fil';
    echo '</td>';   
    echo '<td headers="desi">';
    echo $dataccefil['0']['accefil'];  
    echo '</td>';
    echo '<td headers="prix">';  
    echo $dataccefil['0']['prixaccefil'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantiaccefil;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalaccefil = $dataccefil['0']['prixaccefil']*$quantiaccefil;
    echo '</td>';
    echo '</tr>';
    $arrayAccefil = array_combine(array($dataccefil['0']['accefil']), array($totalaccefil));
    $arrayPriQuantiAccefil = array_combine(array($dataccefil['0']['prixaccefil']), array($quantiaccefil));
}

elseif (empty($dataccefil) || $quantiaccefil==0) {
    $totalaccefil = 0;
    $arrayAccefil = array();
    $arrayPriQuantiAccefil = array();
}

if(!empty($dataisorub) && $quantisorub>0){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Isolateur ruban';
    echo '</td>';   
    echo '<td headers="desi">';
    echo $dataisorub['0']['isorub'];  
    echo '</td>';
    echo '<td headers="prix">';  
    echo $dataisorub['0']['prixisoruban'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantisorub;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalisorub = $dataisorub['0']['prixisoruban']*$quantisorub;
    echo '</td>';
    echo '</tr>';
    $arrayIsorub = array_combine(array($dataisorub['0']['isorub']), array($totalisorub));
    $arrayPriQuantIsorub = array_combine(array($dataisorub['0']['prixisoruban']), array($quantisorub));
}

elseif (empty($dataisorub) || $quantisorub==0) {
    $totalisorub = 0;
    $arrayIsorub = array();
    $arrayPriQuantIsorub = array();
}

if(!empty($dataccerub) && $quantiaccerub>0){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Accesoire ruban';
    echo '</td>';   
    echo '<td headers="desi">';
    echo $dataccerub['0']['accerub'];
    echo '</td>';
    echo '<td headers="prix">';  
    echo $dataccerub['0']['prixaccerub'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantiaccerub;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalaccerub = $dataccerub['0']['prixaccerub']*$quantiaccerub;
    echo '</td>';
    echo '</tr>';
    $arrayAccerub = array_combine(array($dataccerub['0']['accerub']), array($totalaccerub));
    $arrayPriQuantiAccerub = array_combine(array($dataccerub['0']['prixaccerub']), array($quantiaccerub));
}

elseif (empty($dataccerub) || $quantiaccerub==0 ) {
    $totalaccerub = 0;
    $arrayAccerub = array();
    $arrayPriQuantiAccerub = array();
}

if(!empty($dataccentre) && $quantiaccentre>0 ){
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Accessoire entrée';
    echo '</td>';   
    echo '<td headers="desi">';
    echo $dataccentre['0']['acceentre'];  
    echo '</td>';
    echo '<td headers="prix">';  
    echo $dataccentre['0']['prixaccentre'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantiaccentre;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totalaccentre = $dataccentre['0']['prixaccentre']*$quantiaccentre;
    echo '</td>';
    echo '</tr>';
    $arrayAccentre = array_combine(array($dataccentre['0']['acceentre']), array($totalaccentre));
    $arrayPriQuantiAccentre = array_combine(array($dataccentre['0']['prixaccentre']), array($quantiaccentre));
}

elseif (empty($dataccentre) || $quantiaccentre==0  ) {
    $totalaccentre = 0;
    $arrayAccentre = array();
    $arrayPriQuantiAccentre = array();
}

if(!empty($datatest) && $quantitest>0 ){ 
    echo '<tr>';
    echo '<td headers="nom">'; 
    echo 'Testeur';
    echo '</td>';   
    echo '<td headers="desi">';
    echo $datatest['0']['testeur'];  
    echo '</td>';
    echo '<td headers="prix">';   
    echo $datatest['0']['prixtesteur'];
    echo '</td>';
    echo '<td headers="quant">';
    echo $quantitest;
    echo '</td>';
    echo '<td headers="tot">';
    echo $totaltest = $datatest['0']['prixtesteur']*$quantitest;
    echo '</td>';
    echo '</tr>';
    $arrayTest = array_combine(array($datatest['0']['testeur']), array($totaltest));
    $arrayPriQuantiTest = array_combine(array($datatest['0']['prixtesteur']), array($quantitest));
}

elseif (empty($datatest) || $quantitest==0) {
    $totaltest = 0;
    $arrayTest = array();
    $arrayPriQuantiTest = array();
}
    echo '<tr id="bordure">';
    echo '<td headers="nom" id="premiere" >'; 
    echo '</td>';   
    echo '<td headers="desi" id="deuxieme" >';
    echo '</td>';
    echo '<td headers="prix" id="troisieme" >';   
    echo '</td>';
    echo '<td headers="quant" id="quatrieme" >';
    echo '</td>';
    echo '<td headers="tot" id="total">';
    echo $total = $totalelec+$totalfil+$totalrub+$totalcord+$totalfilet+$totalpiquet+$totalcable+$totalisocord+$totalisofil+$totalaccefil+$totalisorub+$totalaccerub+$totalaccentre+$totaltest;
    echo '</td>';
    echo '</tr>';

    $arrayResultat = array_merge($arrayElec,$arrayFil,$arrayRub,$arrayCord,$arrayFilet,$arrayPiquet,$arrayCable,$arrayIsocord,$arrayIsofil,$arrayAccefil,$arrayIsorub,$arrayAccerub,$arrayAccentre,$arrayTest);
    $arrayPrix = array_merge($arrayPriQuantiElec,$arrayPriQuantiFil,$arrayPriQuantiRub,$arrayPriQuantiCord,$arrayQuantiFilet,$arrayPriQuantiPiq,$arrayPriQuantiCabl,$arrayPriQuantIsocord,
    $arrayPriQuantIsofil,$arrayPriQuantiAccefil,$arrayPriQuantIsorub,$arrayPriQuantiAccerub,$arrayPriQuantiAccentre,$arrayPriQuantiTest);


$_SESSION['arrayResultat'] = $arrayResultat;
$_SESSION['arrayPrix']     = $arrayPrix;
$_SESSION['total']         = $total;
  ?>
  <!--Script JS pour rendre les tableaux responsif -->
  <script type="text/javascript">
    var tds = document.getElementsByTagName("td");
      for(var i=0; i<tds.length; i++){
        var td = tds[i];
        if(td.hasAttribute("headers")){
            var th = document.getElementById(td.getAttribute("headers"));
            if(th != null){
                td.setAttribute("data-headers", th.textContent);
              }
          }        
      }
    </script>   
      
    </tbody>
    </table>
    <div class="button"> 
        <button class="btn-flat waves-effect" id="return" type="button" onclick="location.href='index.php';" value="retour accueil" >
          <i class="material-icons right"></i>Retour à l'accueil
        </button> 
        <button class="btn waves-effect waves-light green" id="contact" type="button" onclick="location.href='demande-devis.php';" value="formulaire de contact" >
          <i class="material-icons right"></i>Demande de devis
        </button> 
    </div>   
  </div>
</body> 
</html> 