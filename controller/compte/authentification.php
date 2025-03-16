<?php 

session_start(); 
require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Compte.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$compte = new Compte($conn); 

if(isset($_POST['email']) and isset($_POST['motPasse'])) 
{
    $compte->setEmail($_POST['email']); 
    $compte->setMotpasse($_POST['motPasse']); 

    if($c = $compte->authentification()) {
        $role = $c[0]['role']; 
        $_SESSION['id_compte'] = $c[0]['id_compte']; 
        $_SESSION['nom'] = $c[0]['nom']; 
        $_SESSION['prenom'] = $c[0]['prenom']; 
        $_SESSION['email'] = $c[0]['email']; 
        $_SESSION['motPasse'] = $c[0]['motPasse']; 
        $_SESSION['tel'] = $c[0]['tel']; 
        $_SESSION['role'] = $c[0]['role']; 

        switch($role) 
        {
            case 'admin': 
                // On redirige vers la page d'administration; 
                header('Location: ../../view/admin/liste_vente.php'); 
                break; 
            case 'client':
                header('Location: ../../view/client/liste_produit.php'); 
                break; 
            default: 
            header('Location: ../../view/vendeur/liste_produit.php'); 
        }
    }
    else {
        header('Location: ../../view/se_connecter.php'); 
    }
}



