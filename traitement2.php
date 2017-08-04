<?php
session_start();
error_reporting(E_ALL);

$animal      = $_SESSION['mysql_result_animal']; 
$nom         = $_SESSION['mysql_result_type_elec']; 
$longueur    = $_SESSION['mysql_result_distance']; 
$type        = $_SESSION['mysql_result_veget']; 
$electriseur = $_SESSION['electrificateur'];
$conducteur  = $_POST['conducteur'];
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


$query = "SELECT distinct fil,filet,ruban,corde FROM accessoireconducteur 
        LEFT outer join electriseur ON accessoireconducteur.idelectriseur = electriseur.idelectriseur
        LEFT outer join conducteur ON accessoireconducteur.idconducteur = conducteur.idconducteur
        LEFT outer join fils ON accessoireconducteur.idfil = fils.idfil 
        LEFT outer join ruban ON accessoireconducteur.idruban = ruban.idruban
        LEFT outer join filet ON accessoireconducteur.idfilet = filet.idfilet
        LEFT outer join corde ON accessoireconducteur.idcorde = corde.idcorde
        LEFT outer join animaux ON accessoireconducteur.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON accessoireconducteur.idtype= type_electriseur.idtype
        LEFT outer join distance ON accessoireconducteur.iddistance = distance.iddistance
        LEFT outer join vegetation ON accessoireconducteur.idvegetation = vegetation.idvegetation
        WHERE conducteur ='$conducteur'
        AND animal ='$animal'
        AND nom ='$nom'
        AND longueur ='$longueur'
        AND type ='$type'
        AND electriseur = '$electriseur'
        ";

$prep = $pdo->prepare($query);
 
//Associer des valeurs aux place holders
$prep->bindParam(':conducteur', $conducteur, PDO::PARAM_STR);
$prep->bindParam(':electriseur', $electriseur, PDO::PARAM_STR);
$prep->bindParam(':animal', $animal, PDO::PARAM_STR);
$prep->bindParam(':nom',$nom, PDO::PARAM_STR);
$prep->bindParam(':longueur', $longueur, PDO::PARAM_STR);
$prep->bindParam(':type', $type, PDO::PARAM_STR);
 
//Compiler et exécuter la requête
$prep->execute();
 
//Récupérer toutes les données retournées
$arrAll2 = $prep->fetchAll();
 
//Clore la requête préparée
$prep->closeCursor();
$prep = NULL;
$_SESSION['mysql_result_conducteur'] = $arrAll2;
$_SESSION['conduc']                  = $conducteur; 

header("location:conducteur.php");
?>