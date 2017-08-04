<?php
session_start();
error_reporting(E_ALL);

try {
    $strConnection = 'mysql:host=localhost;dbname=clotucra_cloture'; //Ligne 1
    $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); //Ligne 2
    $pdo = new PDO($strConnection, 'clotucra_manu', '220972Manuel', $arrExtraParam); //Ligne 3; Instancie la connexion
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Ligne 4
}
catch(PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}

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
$prep1 = $pdo->prepare($reqelec);
$prep1->execute();
$prep2 = $pdo->prepare($reqfil);
$prep2->execute();
$prep3 = $pdo->prepare($reqrub);
$prep3->execute();
$prep4 = $pdo->prepare($reqcord);
$prep4->execute();
$prep5 = $pdo->prepare($reqfilet);
$prep5->execute();
$prep6 = $pdo->prepare($reqpiquet);
$prep6->execute();
$prep7 = $pdo->prepare($reqcable);
$prep7->execute();
$prep8 = $pdo->prepare($reqisocord);
$prep8->execute();
$prep9 = $pdo->prepare($reqisofil);
$prep9->execute();
$prep10 = $pdo->prepare($reqaccefil);
$prep10->execute();
$prep11 = $pdo->prepare($reqisorub);
$prep11->execute();
$prep12 = $pdo->prepare($reqaccerub);
$prep12->execute();
$prep13 = $pdo->prepare($reqaccentre);
$prep13->execute();
$prep14 = $pdo->prepare($reqtest);
$prep14->execute();
 
//Récupérer toutes les données retournées
$data_elec= $prep1->fetchAll(PDO::FETCH_ASSOC);
$data_fil = $prep2->fetchAll(PDO::FETCH_ASSOC);
$data_ruban = $prep3->fetchAll(PDO::FETCH_ASSOC);
$data_corde = $prep4->fetchAll(PDO::FETCH_ASSOC);
$data_filet= $prep5->fetchAll(PDO::FETCH_ASSOC);
$data_piquet= $prep6->fetchAll(PDO::FETCH_ASSOC);
$data_cable = $prep7->fetchAll(PDO::FETCH_ASSOC);
$data_isocord= $prep8->fetchAll(PDO::FETCH_ASSOC);
$data_isofil= $prep9->fetchAll(PDO::FETCH_ASSOC);
$data_accefil= $prep10->fetchAll(PDO::FETCH_ASSOC);
$data_isorub= $prep11->fetchAll(PDO::FETCH_ASSOC);
$data_accerub= $prep12->fetchAll(PDO::FETCH_ASSOC);
$data_accentre= $prep13->fetchAll(PDO::FETCH_ASSOC);
$data_test= $prep14->fetchAll(PDO::FETCH_ASSOC);

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