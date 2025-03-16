<?php 

require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Produit.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$produit = new Produit($conn); 
