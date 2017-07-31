<?php
session_start();
error_reporting(E_ALL);
/*$serveur = "localhost";
$admin   = "root";
$mdp     = "root";
$base    = "cloture";*/
$serveur = "localhost";
$admin   = "clotucra_manu";
$mdp     = "220972Manuel";
$base    = "clotucra_cloture";

$bdd4 = mysqli_connect($serveur,$admin,$mdp,$base);

$electrificateur = $_SESSION['electrificateur'];
$fil             = $_SESSION['fil'];
$corde           = $_SESSION['corde'];
$ruban           = $_SESSION['ruban'];
$filet           = $_SESSION['filet'];
$piquet          = $_SESSION['piquet'] ;
$cable           = $_SESSION['cable'] ;
$isocord         = $_SESSION['isocord'] ;
$isofil          = $_SESSION['isofil'] ;
$accefil         = $_SESSION['accefil'] ;
$isorub          = $_SESSION['isorub'] ;
$accerub         = $_SESSION['accerub'] ;
$acceentre       = $_SESSION['acceentre'] ;
$testeur         = $_SESSION['testeur'] ;

$quantitefil      = $_POST['quantitefil'];
$quantitecorde    = $_POST['quantitecorde'];
$quantiteruban    = $_POST['quantiteruban'];
$quantitefilet    = $_POST['quantitefilet'];
$quantitepiquet   = $_POST['quantitepiquet'];
$quantitecable    = $_POST['quantitecable'];
$quantiteisocord  = $_POST['quantiteisocord'];
$quantiteisofil   = $_POST['quantiteisofil'];
$quantiteaccefil  = $_POST['quantiteaccefil'];
$quantiteisorub   = $_POST['quantiteisorub'];
$quantiteaccerub  = $_POST['quantiteaccerub'];
$quantiteaccentre = $_POST['quantiteaccentre'];
$quantitetest     = $_POST['quantitetest'];


$reqelec= "SELECT  * FROM electriseur
        WHERE electriseur = '$electrificateur'
        ";
$reqfil = "SELECT * FROM fils 
		WHERE fil = '$fil'
		"; 
$reqrub = "SELECT * FROM ruban
		WHERE ruban = '$ruban'
		";
$reqcord="SELECT * FROM corde 
		WHERE corde = '$corde'
		";
$reqfilet="SELECT * FROM filet
		WHERE filet = '$filet'
		";
$reqpiquet="SELECT * FROM piquetterre
		WHERE piquet = '$piquet'
		";
$reqcable="SELECT distinct * FROM cableht
		WHERE cable = '$cable'
		";
$reqisocord="SELECT * FROM isolateurcorde
		WHERE isocord = '$isocord'
		";				
$reqisofil="SELECT * FROM isolateurfil
		WHERE isofil = '$isofil'
		";
$reqaccefil="SELECT * FROM accessoirefil
		WHERE accefil = '$accefil'
		";		
$reqisorub="SELECT * FROM isolateurruban
		WHERE isorub = '$isorub'
		";
$reqaccerub="SELECT * FROM accessoireruban
		WHERE accerub = '$accerub'
		";
$reqaccentre="SELECT * FROM accessoireentre
		WHERE acceentre = '$acceentre'
		";
$reqtest= "SELECT * FROM testeurht
		WHERE testeur = '$testeur'
		";					

$resultat_elec     = mysqli_query($bdd4,$reqelec);
$resultat_fil      = mysqli_query($bdd4,$reqfil);
$resultat_rub      = mysqli_query($bdd4,$reqrub);
$resultat_cord     = mysqli_query($bdd4,$reqcord);
$resultat_filet    = mysqli_query($bdd4,$reqfilet);
$resultat_piquet   = mysqli_query($bdd4,$reqpiquet);
$resultat_cable    = mysqli_query($bdd4,$reqcable);
$resultat_isocord  = mysqli_query($bdd4,$reqisocord);
$resultat_isofil   = mysqli_query($bdd4,$reqisofil);
$resultat_accefil  = mysqli_query($bdd4,$reqaccefil);
$resultat_isorub   = mysqli_query($bdd4,$reqisorub);
$resultat_accerub  = mysqli_query($bdd4,$reqaccerub);
$resultat_accentre = mysqli_query($bdd4,$reqaccentre);
$resultat_test     = mysqli_query($bdd4,$reqtest);

$data_elec     = mysqli_fetch_array($resultat_elec);
$data_fil      = mysqli_fetch_array($resultat_fil);
$data_ruban    = mysqli_fetch_array($resultat_rub);
$data_corde    = mysqli_fetch_array($resultat_cord);
$data_filet    = mysqli_fetch_array($resultat_filet);
$data_piquet   = mysqli_fetch_array($resultat_piquet);
$data_cable    = mysqli_fetch_array($resultat_cable);
$data_isocord  = mysqli_fetch_array($resultat_isocord);
$data_isofil   = mysqli_fetch_array($resultat_isofil);
$data_accefil  = mysqli_fetch_array($resultat_accefil);
$data_isorub   = mysqli_fetch_array($resultat_isorub);
$data_accerub  = mysqli_fetch_array($resultat_accerub);
$data_accentre = mysqli_fetch_array($resultat_accentre);
$data_test     = mysqli_fetch_array($resultat_test);

$_SESSION['data_elec']     = $data_elec;
$_SESSION['data_fil']      = $data_fil;
$_SESSION['data_ruban']    = $data_ruban;
$_SESSION['data_corde']    = $data_corde;
$_SESSION['data_filet']    = $data_filet;
$_SESSION['data_piquet']   = $data_piquet;
$_SESSION['data_cable']    = $data_cable;
$_SESSION['data_isocord']  = $data_isocord;
$_SESSION['data_isofil']   = $data_isofil;
$_SESSION['data_accefil']  = $data_accefil;
$_SESSION['data_isorub']   = $data_isorub;
$_SESSION['data_accerub']  = $data_accerub;
$_SESSION['data_accentre'] = $data_accentre;
$_SESSION['data_test']     = $data_test;

$_SESSION['quantitefil']      = $quantitefil;
$_SESSION['quantitecorde']    = $quantitecorde;
$_SESSION['quantitefilet']    = $quantitefilet;
$_SESSION['quantiteruban']    = $quantiteruban;
$_SESSION['quantitepiquet']   = $quantitepiquet;
$_SESSION['quantitecable']    = $quantitecable;
$_SESSION['quantiteisocord']  = $quantiteisocord;
$_SESSION['quantiteisofil']   = $quantiteisofil;
$_SESSION['quantiteaccefil']  = $quantiteaccefil;
$_SESSION['quantiteisorub']   = $quantiteisorub;
$_SESSION['quantiteaccerub']  = $quantiteaccerub;
$_SESSION['quantiteaccentre'] = $quantiteaccentre;
$_SESSION['quantitetest']     = $quantitetest;


header("location:recapitulatif.php");

?>