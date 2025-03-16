<?php

session_start(); 

require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Produit.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$produit = new Produit($conn); 
$produitRechercher = $_GET['produit']; 

$produitTrouve = $produit->trouver($produitRechercher);

if($produitTrouve) {
    $_SESSION['produit_trouve'] = $produitTrouve; 
}
header('Location: ../../view/client/resultat_recherche.php'); 