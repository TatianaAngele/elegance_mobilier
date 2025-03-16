<?php 

require_once '../../config/BaseDeDonnees.php';
require_once '../../model/Produit.php'; 

$base = new BaseDeDonnees(); 
$conn = $base->getConnection(); 

$produit = new Produit($conn); 
$produit->setId_vendeur($_POST['id_vendeur']); 
$produit->setNom_produit($_POST['nom_produit']); 
$produit->setPrix($_POST['prix']); 
$produit->setQuantite($_POST['quantite']); 

// Vérifier si un fichier a été soumis
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
    $nom_complet = $_FILES['photo']['name']; // Nom du fichier (ex: document.pdf)
    $nom_temporaire = $_FILES['photo']['tmp_name']; // Emplacement temporaire
    $taille_fichier = $_FILES['photo']['size']; // Taille du fichier
    $dossier_upload = "../../view/assets/uploads/"; // Dossier où stocker le fichier

    // Extraire le nom et l'extension
    $nom_fichier = pathinfo($nom_complet, PATHINFO_FILENAME); // Nom sans extension
    $extension = pathinfo($nom_complet, PATHINFO_EXTENSION); // Extension du fichier

    // Extensions autorisées
    $extensions_autorisees = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx'];

    // Vérifier l'extension
    if (!in_array(strtolower($extension), $extensions_autorisees)) {
        die("Erreur : Extension non autorisée !");
    }

    // Générer un nom unique pour éviter les conflits
    $nouveau_nom = $nom_fichier . "_" . time() . "." . $extension;

    // Déplacer le fichier uploadé dans le dossier cible
    move_uploaded_file($nom_temporaire, $dossier_upload . $nouveau_nom);
    $produit->setPhoto($nouveau_nom);

    if($produit->ajouter()) 
    {
        header('Location: ../../view/vendeur/liste_produit.php'); 
    }
} else {
    echo "Aucun fichier soumis ou erreur lors de l'upload.";
}
?>
