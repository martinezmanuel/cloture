<?php 
session_start();
error_reporting(E_ALL);

$animal   = $_POST['animaux'];
$nom      = $_POST['type_electriseur'];
$longueur = $_POST['distance'];
$type     = $_POST['vegetation'];
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

//Préparer la requête
$query = "SELECT distinct electriseur FROM resultat
        LEFT outer join animaux ON resultat.idanimal = animaux.idanimal
        LEFT outer join type_electriseur ON resultat.idtype= type_electriseur.idtype
        LEFT outer join distance ON resultat.iddistance = distance.iddistance
        LEFT outer join vegetation ON resultat.idvegetation = vegetation.idvegetation
        LEFT outer join electriseur ON resultat.idelectriseur = electriseur.idelectriseur
        LEFT outer join conducteur ON resultat.idconducteur = conducteur.idconducteur
        WHERE animal = :animal
        AND nom = :nom
        AND longueur = :longueur
        AND type = :type
        ";
$prep = $pdo->prepare($query);
 
//Associer des valeurs aux place holders
$prep->bindParam(':animal', $animal, PDO::PARAM_STR);
$prep->bindParam(':nom',$nom, PDO::PARAM_STR);
$prep->bindParam(':longueur', $longueur, PDO::PARAM_STR);
$prep->bindParam(':type', $type, PDO::PARAM_STR);
 
//Compiler et exécuter la requête
$prep->execute();
 
//Récupérer toutes les données retournées
$arrAll = $prep->fetchAll();
 
//Clore la requête préparée
$prep->closeCursor();
$prep = NULL;

$_SESSION['mysql_result_elec']      = $arrAll; 
$_SESSION['mysql_result_animal']    = $animal; 
$_SESSION['mysql_result_type_elec'] = $nom; 
$_SESSION['mysql_result_distance']  = $longueur; 
$_SESSION['mysql_result_veget']     = $type; 

header("location:electrificateur.php");
?>