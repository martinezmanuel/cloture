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
$animal      = $_SESSION['mysql_result_animal'] ; 
$nom         = $_SESSION['mysql_result_type_elec']  ; 
$longueur    = $_SESSION['mysql_result_distance']  ; 
$type        = $_SESSION['mysql_result_veget']  ; 
$electriseur = $_POST['electriseur'];

$query = "SELECT distinct conducteur FROM resultat
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        LEFT outer join electriseur ON resultat.idelectriseur = electriseur.idelectriseur
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        WHERE electriseur = :electriseur
        AND animal = :animal
        AND nom = :nom
        AND longueur = :longueur
        AND type = :type
        ";


$prep = $pdo->prepare($query);
 
//Associer des valeurs aux place holders
$prep->bindParam(':electriseur', $electriseur, PDO::PARAM_STR);
$prep->bindParam(':animal', $animal, PDO::PARAM_STR);
$prep->bindParam(':nom',$nom, PDO::PARAM_STR);
$prep->bindParam(':longueur', $longueur, PDO::PARAM_STR);
$prep->bindParam(':type', $type, PDO::PARAM_STR);
 
//Compiler et exécuter la requête
$prep->execute();
 
//Récupérer toutes les données retournées
$arrAll1 = $prep->fetchAll();
 
//Clore la requête préparée
$prep->closeCursor();
$prep = NULL;

$_SESSION['mysql_result_conduc'] = $arrAll1;
$_SESSION['electrificateur']     = $electriseur; 

header("location:typeconducteur.php");
?>    