<?php 

session_start(); 

require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Compte.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$compte = new Compte($conn); 
$compte->setId_compte($_SESSION['id_compte']); 
$compte->setNom($_POST['nom']); 
$compte->setPrenom($_POST['prenom']); 
$compte->setEmail($_POST['email']); 
$compte->setMotpasse($_SESSION['motPasse']); 
$compte->setTel($_POST['tel']); 
$compte->setRole($_SESSION['role']); 

if($compte->modifier()) {
    $_SESSION['id_compte'] = $compte->getId_compte(); 
    $_SESSION['nom'] = $compte->getNom(); 
    $_SESSION['prenom'] = $compte->getPrenom(); 
    $_SESSION['email'] = $compte->getEmail(); 
    $_SESSION['motPasse'] = $compte->getMotpasse(); 
    $_SESSION['tel'] = $compte->getTel(); 
    $_SESSION['role'] = $compte->getRole(); 

    header('Location: ../../view/client/info_compte.php'); 
}
else {

    // Redirection vers l'interface du création de compte 
    echo 'Echec de la modification du compte'; 
}