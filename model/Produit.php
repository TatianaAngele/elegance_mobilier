<?php

class Produit 
{
    private $id_produit; 
    private $id_vendeur; 
    private $nom_produit; 
    private $photo;  
    private $prix; 
    private $quantite; 
    private $conn;  

    function __construct($conn) {
        $this->conn = $conn; 
    } 

    public function getId_produit()
    {
        return $this->id_produit;
    }

    public function setId_produit($id_produit)
    {
        $this->id_produit = $id_produit;
    }

    public function getId_vendeur()
    {
        return $this->id_vendeur;
    }

    public function setId_vendeur($id_vendeur)
    {
        $this->id_vendeur = $id_vendeur;
    }

    public function getNom_produit()
    {
        return $this->nom_produit;
    }

    public function setNom_produit($nom_produit)
    {
        $this->nom_produit = $nom_produit;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    // Pour ajouter un produit 
    public function ajouter() 
    {
        $sql = "INSERT INTO produits(id_vendeur, nom_produit, photo, prix, quantite) VALUES(:id_vendeur, :nom_produit, :photo, :prix, :quantite);"; 
        $stmt = $this->conn->prepare($sql); 

        $stmt->bindParam(':id_vendeur', $this->id_vendeur); 
        $stmt->bindParam(':nom_produit', $this->nom_produit); 
        $stmt->bindParam(':photo', $this->photo); 
        $stmt->bindParam(':prix', $this->prix); 
        $stmt->bindParam(':quantite', $this->quantite); 
       
        if($stmt->execute()) {
            return true; 
        } 
        else {
            return false; 
        }
    }

    // Pour modifier un produit 
    public function modifier() 
    {
        $sql = "UPDATE produits SET nom_produit = :nom_produit, photo = :photo, prix = :prix, quantite = :quantite WHERE id_produit = :id_produit;"; 
        $stmt = $this->conn->prepare($sql); 

        $stmt->bindParam(':nom_produit', $this->nom_produit); 
        $stmt->bindParam(':photo', $this->photo); 
        $stmt->bindParam(':prix', $this->prix); 
        $stmt->bindParam(':quantite', $this->quantite); 
        $stmt->bindParam(':id_produit', $this->id_produit); 
       
        if($stmt->execute()) {
            return true; 
        } 
        else {
            return false; 
        }
    }

    // Pour supprimer un produit 
    public function supprimer() 
    {
        $sql = "DELETE FROM produits WHERE id_produit = :id_produit"; 
        $stmt = $this->conn->prepare($sql); 
        $stmt->bindParam(':id_produit', $this->id_produit); 

        if($stmt->execute()) {
            return true; 
        } 
        else {
            return false; 
        }
    }

    // Lister les produits pour les clients : 
    public function lister() 
    {
        $sql = "SELECT * FROM produits"; 
        $stmt = $this->conn->prepare($sql); 
        $stmt->execute();
        $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($produit) 
        {
            return $produit; 
        }
        return null; 
    }

    // Pour récuperer un produit en conaissant son id : 
    public function recuperer() 
    {
        $sql = "SELECT * FROM produits WHERE id_produit = :id_produit"; 
        $stmt = $this->conn->prepare($sql); 
        $stmt->bindParam(':id_produit', $this->id_produit); 

        $stmt->execute();
        $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($produit) 
        {
            return $produit; 
        }
        return null; 
    }

    // Permet au client de trouver un produit : 
    public function trouver($nomProduit) 
    {
        $sql = "SELECT * FROM produits WHERE nom_produit = :nom_produit"; 
        $stmt = $this->conn->prepare($sql); 
        $stmt->bindParam(':nom_produit', $nomProduit); 

        $stmt->execute();
        $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($produit) 
        {
            return $produit; 
        }
        return null; 
    }

    // Liste des produits pour chaque vendeur : 
    public function liste_produit_vendeur() 
    {
        $sql = "SELECT * FROM produits WHERE id_vendeur = :id_vendeur"; 
        $stmt = $this->conn->prepare($sql); 
        $stmt->bindParam(':id_vendeur', $this->id_vendeur); 

        $stmt->execute();
        $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($produit) 
        {
            return $produit; 
        }
        return null; 
    }

}

?>