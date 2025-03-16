<?php 

session_start(); 

require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Vente.php'; 
require_once '../../model/Produit.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$vente = new Vente($conn); 
$produit = new Produit($conn); 

// Récuperation du quantité en stock du produit 
$produit->setId_produit($_GET['id_produit']); 
$p = $produit->recuperer(); 
$nom_produit = $p[0]['nom_produit']; 
$photo = $p[0]['photo']; 
$prix = $p[0]['prix']; 
$quantite =  (int) $p[0]['quantite']; 

// Si on a au moins un produit : 
if($quantite >= 1) 
{
    // On effectue la vente 
    $vente->setId_client($_SESSION['id_compte']); 
    $vente->setId_produit($_GET['id_produit']); 
    if($vente->ajouter()) {
        header('Location: ../../view/client/produit_achete.php'); 
    } 
    else {
        echo 'Echec de la vente du produit'; 
    }

    // On modifie le produit pour réduire la quantité en stock : 
    $produit->setNom_produit($nom_produit); 
    $produit->setPhoto($photo); 
    $produit->setPrix($prix); 
    $produit->setQuantite($quantite - 1); 
    if($produit->modifier())
    {
        echo '<br>La quantité en stock est réduite en 1'; 
    }
}
else {
    echo 'Produit en épuise de stock'; 
}
