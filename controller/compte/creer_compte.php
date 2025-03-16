<?php 

session_start(); 
require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Compte.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$compte = new Compte($conn); 
$compte->setNom($_POST['nom']); 
$compte->setPrenom($_POST['prenom']); 
$compte->setEmail($_POST['email']); // mivadika $_POST['email']
$compte->setMotpasse($_POST['motPasse']); 
$compte->setTel($_POST['tel']); 
$compte->setRole($_POST['role']); 

$_SESSION['nom'] = $_POST['nom']; 
$_SESSION['prenom'] = $_POST['prenom']; 
$_SESSION['motPasse'] = $_POST['motPasse']; 
$_SESSION['email'] = $_POST['email']; 
$_SESSION['tel'] = $_POST['tel']; 
$_SESSION['role'] = $_POST['role']; 

if($compte->ajouter()) {

    // Récuperer l'id du compte récement ajouté : 
    $id = $compte->recupererDernierId(); 

    // Ajouter l'id dans le session $_SESSION['id_compte']
    $_SESSION['id_compte'] = $id; 

    switch($_POST['role']) 
    {
        case 'client':
            header('Location: ../../view/client/liste_produit.php'); 
            break; 
        case 'vendeur': 
            header('Location: ../../view/vendeur/liste_produit.php'); 
            break; 
        default: 
            header('Location: ../../view/liste_vente.php'); 
    }
}
else {
    header('Location: ../../view/creer_compte.php'); 
}