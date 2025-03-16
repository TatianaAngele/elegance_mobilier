<?php 

class Vente
{
    private $id_vente; 
    private $id_produit; 
    private $id_client; 
    private $date_vente; 
    private $conn;  

    function __construct($conn) {
        $this->conn = $conn; 
    } 

    public function getId_vente()
    {
        return $this->id_vente;
    }

    public function setId_vente($id_vente)
    {
        $this->id_vente = $id_vente;
    }

    public function getId_produit()
    {
        return $this->id_produit;
    }

    public function setId_produit($id_produit)
    {
        $this->id_produit = $id_produit;
    }

    public function getId_client()
    {
        return $this->id_client;
    }

    public function setId_client($id_client)
    {
        $this->id_client = $id_client;
    }

    public function getDate_vente()
    {
        return $this->date_vente;
    }

    public function setDate_vente($date_vente)
    {
        $this->date_vente = $date_vente;
    }

    // Ajouter une vente lorsque le client achète un produit
    public function ajouter() 
    {
        $sql = "INSERT INTO vente(id_produit, id_client) VALUES(:id_produit, :id_client);"; 
        $stmt = $this->conn->prepare($sql); 

        $stmt->bindParam(':id_produit', $this->id_produit); 
        $stmt->bindParam(':id_client', $this->id_client); 
        
        if($stmt->execute()) {
            return true; 
        } 
        else {
            return false; 
        }
    }

    // Pour lister les produits acheté par le client 
    public function liste_vente_client() 
    {
        $sql = "SELECT vente.date_vente, produits.nom_produit, produits.photo, produits.prix FROM vente INNER JOIN produits ON vente.id_produit = produits.id_produit WHERE vente.id_client = :id_client;"; 
        $stmt = $this->conn->prepare($sql); 

        $stmt->bindParam(':id_client', $this->id_client);
        $stmt->execute();
        $vente = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($vente) 
        {
            return $vente; 
        }
        return null; 
    }

    // Pour lister des produits vendu par le vendeur 
    public function liste_vente_vendeur($id_vendeur) 
    {
        $sql = "SELECT 
                    vente.date_vente, 
                    produits.nom_produit, 
                    produits.photo, 
                    produits.prix, 
                    compte.nom AS nom_client, 
                    compte.prenom AS prenom_client
                FROM vente
                INNER JOIN produits ON vente.id_produit = produits.id_produit
                INNER JOIN compte ON vente.id_client = compte.id_compte
                WHERE produits.id_vendeur = :id_vendeur";

        $stmt = $this->conn->prepare($sql); 
        $stmt->bindParam(':id_vendeur', $id_vendeur); 
        $stmt->execute();
        $vente = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($vente) 
        {
            return $vente; 
        }
        return null; 
    }

    // Pour lister les produits acheté par l'admin 
    public function liste_vente_admin() 
    {
        $sql = "SELECT 
                    vente.date_vente, 
                    produits.nom_produit, 
                    produits.photo, 
                    produits.prix, 
                    client.nom AS nom_client, 
                    client.prenom AS prenom_client,
                    vendeur.nom AS nom_vendeur, 
                    vendeur.prenom AS prenom_vendeur
                FROM vente
                INNER JOIN produits ON vente.id_produit = produits.id_produit
                INNER JOIN compte AS client ON vente.id_client = client.id_compte
                INNER JOIN compte AS vendeur ON produits.id_vendeur = vendeur.id_compte;";

        $stmt = $this->conn->prepare($sql); 
        $stmt->execute();
        $vente = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($vente) 
        {
            return $vente; 
        }
        return null; 
    }
}