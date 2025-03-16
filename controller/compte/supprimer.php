<?php 

require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Compte.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$compte = new Compte($conn); 
$compte->setId_compte(3); 

if($compte->supprimer()) {
    echo 'Compte supprimé avec succes'; 

    // Redirection vers l'interface correspondante 
}
else {

    // Redirection vers l'interface du création de compte 
    echo 'Echec de la suppression du compte'; 
}