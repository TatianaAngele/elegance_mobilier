<?php 

session_start(); 

require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Produit.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$produit = new Produit($conn); 
$produit->setId_produit($_POST['id_produit']); 
$produit->setNom_produit($_POST['nom_produit']); 
$produit->setPhoto($_POST['photo']); 
$produit->setPrix($_POST['prix']); 
$produit->setQuantite($_POST['quantite']); 

if($produit->modifier()) {
    header('Location: ../../view/vendeur/liste_produit.php'); 
}
else {
    header('Location: ../../view/vendeur/liste_produit.php'); 
}