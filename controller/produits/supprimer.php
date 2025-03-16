<?php 

require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Produit.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$produit = new Produit($conn); 
$produit->setId_produit($_GET['id_produit']); 

if($produit->supprimer()) {
    header('Location: ../../view/vendeur/liste_produit.php'); 
}
else {
    header('Location: ../../view/vendeur/liste_produit.php'); 
}