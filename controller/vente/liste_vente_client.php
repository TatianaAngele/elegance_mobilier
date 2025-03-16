<?php 

session_start(); 

require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Vente.php'; 
require_once '../../model/Produit.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$vente = new Vente($conn); 
 

