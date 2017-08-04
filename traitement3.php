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


$conducteur  = $_SESSION['conduc'];
$animal      = $_SESSION['mysql_result_animal'] ; 
$nom         = $_SESSION['mysql_result_type_elec'] ; 
$longueur    = $_SESSION['mysql_result_distance'] ; 
$type        = $_SESSION['mysql_result_veget'] ; 
$electriseur = $_SESSION['mysql_result_elec']  ;
$fils        = $_POST['fils'];
$ruban       = $_POST['ruban'];
$filet       = $_POST['filet'];
$corde       = $_POST['corde'];



$req3 = "SELECT distinct piquet
         FROM resultat
        LEFT outer join piquetterre ON resultat.idpiquet = piquetterre.idpiquet 
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        WHERE conducteur = '$conducteur'
        AND animal = '$animal'
        AND nom = '$nom'
        AND longueur = '$longueur'
        AND type = '$type'";

 $req4 = "SELECT distinct cable 
        FROM resultat 
        LEFT outer join cableht ON resultat.idcable = cableht.idcable
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        WHERE conducteur = '$conducteur'
        AND animal = '$animal'
        AND nom = '$nom'
        AND longueur = '$longueur'
        AND type = '$type'";

 $req5 = "SELECT distinct isocord 
        FROM resultat
        LEFT outer join isolateurcorde ON resultat.idconducteur = isolateurcorde.idconducteur
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        WHERE conducteur = '$conducteur'
        AND animal = '$animal'
        AND nom = '$nom'
        AND longueur = '$longueur'
        AND type = '$type'";

 $req6 = "SELECT distinct isofil 
        FROM resultat
        LEFT outer join isolateurfil ON resultat.idconducteur = isolateurfil.idconducteur
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        WHERE conducteur = '$conducteur'
        AND animal = '$animal'
        AND nom = '$nom'
        AND longueur = '$longueur'
        AND type = '$type'";

 $req7 = "SELECT distinct accefil 
        FROM resultat
        LEFT outer join accessoirefil ON resultat.idconducteur = accessoirefil.idconducteur
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        WHERE conducteur = '$conducteur'
        AND animal = '$animal'
        AND nom = '$nom'
        AND longueur = '$longueur'
        AND type = '$type'";

 $req8 = "SELECT distinct isorub 
        FROM resultat
        LEFT outer join isolateurruban ON resultat.idconducteur = isolateurruban.idconducteur
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        WHERE conducteur = '$conducteur'
        AND animal = '$animal'
        AND nom = '$nom'
        AND longueur = '$longueur'
        AND type = '$type'";

 $req9 = "SELECT distinct accerub 
        FROM resultat
        LEFT outer join accessoireruban ON resultat.idconducteur = accessoireruban.idconducteur
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        WHERE conducteur = '$conducteur'
        AND animal = '$animal'
        AND nom = '$nom'
        AND longueur = '$longueur'
        AND type = '$type'";

 $req0 = "SELECT distinct acceentre 
        FROM resultat
        LEFT outer join accessoireentre ON resultat.idconducteur = accessoireentre.idconducteur
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        WHERE conducteur = '$conducteur'
        AND animal = '$animal'
        AND nom = '$nom'
        AND longueur = '$longueur'
        AND type = '$type'";

 $req1 = "SELECT distinct testeur 
        FROM resultat
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        LEFT outer join testeurht ON resultat.idtesteur = testeurht.idtesteur
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        WHERE conducteur = '$conducteur'
        AND animal = '$animal'
        AND nom = '$nom'
        AND longueur = '$longueur'
        AND type = '$type'";

$prep=$pdo->prepare($req3);
$prep->execute();
$prep1=$pdo->prepare($req4);
$prep1->execute();
$prep2=$pdo->prepare($req5);
$prep2->execute();
$prep3=$pdo->prepare($req6);
$prep3->execute();
$prep4=$pdo->prepare($req7);
$prep4->execute();
$prep5=$pdo->prepare($req8);
$prep5->execute();
$prep6=$pdo->prepare($req9);
$prep6->execute();
$prep7=$pdo->prepare($req0);
$prep7->execute();
$prep8=$pdo->prepare($req1);
$prep8->execute();
$piquet = $prep->fetchAll();
$cable = $prep1->fetchAll();
$isocord = $prep2->fetchAll();
$isofil = $prep3->fetchAll();
$accefil = $prep4->fetchAll();
$isorub = $prep5->fetchAll();
$accerub = $prep6->fetchAll();
$acceentre = $prep7->fetchAll();
$testeur = $prep8->fetchAll();

$_SESSION['mysql_result_piquet']    = $piquet ;
$_SESSION['mysql_result_cable']     = $cable  ;
$_SESSION['mysql_result_isocord']   = $isocord;
$_SESSION['mysql_result_isofil']    = $isofil ;
$_SESSION['mysql_result_accefil']   = $accefil ;
$_SESSION['mysql_result_isorub']    = $isorub   ;
$_SESSION['mysql_result_accerub']   = $accerub ;
$_SESSION['mysql_result_acceentre'] = $acceentre ;
$_SESSION['mysql_result_testeur']   = $testeur ;
$_SESSION['fil']                    = $fils  ;
$_SESSION['ruban']                  = $ruban ;
$_SESSION['filet']                  = $filet ;
$_SESSION['corde']                  = $corde ;


header("location:accessoire.php");
?>