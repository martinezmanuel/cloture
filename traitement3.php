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

$bdd3 = mysqli_connect($serveur,$admin,$mdp,$base);

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
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        LEFT outer join piquetterre ON resultat.idpiquet = piquetterre.idpiquet
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        WHERE conducteur = '$conducteur'
        AND animal = '$animal'
        AND nom = '$nom'
        AND longueur = '$longueur'
        AND type = '$type'
        ";

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
        AND type = '$type'
        ";

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


$result  = mysqli_query($bdd3 ,$req3);
$result1 = mysqli_query($bdd3 ,$req4);
$result2 = mysqli_query($bdd3 ,$req5);
$result3 = mysqli_query($bdd3 ,$req6);
$result4 = mysqli_query($bdd3 ,$req7);
$result5 = mysqli_query($bdd3 ,$req8);
$result6 = mysqli_query($bdd3 ,$req9);
$result7 = mysqli_query($bdd3 ,$req0);
$result8 = mysqli_query($bdd3 ,$req1);
$array3 = [];
$array4 = [];
$array5 = [];
$array6 = [];
$array7 = [];
$array8 = [];
$array9 = [];
$array0 = [];
$array1 = [];

while( $row3 = mysqli_fetch_assoc($result))
{ 
    $array3[] = $row3;
}
while( $row4 = mysqli_fetch_assoc($result1))
{ 
    $array4[] = $row4;
}
while( $row5 = mysqli_fetch_assoc($result2))
{ 
    $array5[] = $row5;
}
while( $row6 = mysqli_fetch_assoc($result3))
{ 
    $array6[] = $row6;
}
while( $row7 = mysqli_fetch_assoc($result4))
{ 
    $array7[] = $row7;
}
while( $row8 = mysqli_fetch_assoc($result5))
{ 
    $array8[] = $row8;
}
while( $row9 = mysqli_fetch_assoc($result6))
{ 
    $array9[] = $row9;
}
while( $row0 = mysqli_fetch_assoc($result7))
{ 
    $array0[] = $row0;
}
while( $row1 = mysqli_fetch_assoc($result8))
{ 
    $array1[] = $row1;
}

$piquet    = array_values($array3);
$piquet    = array_unique( $piquet,SORT_REGULAR );

$cable     = array_values($array4);
$cable     = array_unique( $cable ,SORT_REGULAR );

$isocord   = array_values($array5);
$isocord   = array_unique( $isocord ,SORT_REGULAR );

$isofil    = array_values($array6);
$isofil    = array_unique( $isofil,SORT_REGULAR );

$accefil   = array_values($array7);
$accefil   = array_unique( $accefil ,SORT_REGULAR );

$isorub    = array_values($array8);
$isorub    = array_unique( $isorub ,SORT_REGULAR );

$accerub   = array_values($array9);
$accerub   = array_unique( $accerub,SORT_REGULAR );

$acceentre = array_values($array0);
$acceentre = array_unique( $acceentre,SORT_REGULAR );

$testeur   = array_values($array1);
$testeur   = array_unique( $testeur,SORT_REGULAR );

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