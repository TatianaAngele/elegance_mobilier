<?php 

class Compte 
{
    private $id_compte; 
    private $nom; 
    private $prenom; 
    private $email; 
    private $motPasse; 
    private $tel; 
    private $role;
    private $conn;  

    function __construct($conn) {
        $this->conn = $conn; 
    } 

    public function getNom() 
    {
        return $this->nom; 
    }

    public function setNom($nom) 
    {
        $this->nom = $nom; 
    }

    public function getPrenom() 
    {
        return $this->prenom; 
    }

    public function setPrenom($prenom) 
    {
        $this->prenom = $prenom; 
    }

    public function getId_compte() 
    {
        return $this->id_compte; 
    }

    public function setId_compte($id) 
    {
        $this->id_compte = $id; 
    } 

    public function getEmail() 
    {
        return $this->email; 
    }

    public function setEmail($email) 
    {
        $this->email = $email; 
    }

    public function getMotpasse() 
    {
        return $this->motPasse; 
    }

    public function setMotpasse($mdp) 
    {
        $this->motPasse = $mdp; 
    }

    public function getTel() 
    {
        return $this->tel; 
    } 

    public function setTel($tel) 
    {
        $this->tel = $tel; 
    }

    public function getRole() 
    {
        return $this->role; 
    }

    public function setRole($role) 
    {
        $this->role = $role; 
    }

    // Pour créer un compte (client, admin, vendeur)
    public function ajouter() 
    {
        $sql = "INSERT INTO compte(nom, prenom, email, motPasse, tel, role) VALUES(:nom, :prenom, :email, :motPasse, :tel, :role);"; 
        $stmt = $this->conn->prepare($sql); 

        $stmt->bindParam(':nom', $this->nom); 
        $stmt->bindParam(':prenom', $this->prenom); 
        $stmt->bindParam(':email', $this->email); 
        $stmt->bindParam(':motPasse', $this->motPasse); 
        $stmt->bindParam(':tel', $this->tel); 
        $stmt->bindParam(':role', $this->role); 

        if($stmt->execute()) {
            return true; 
        } 
        else {
            return false; 
        }
    }

    // Modification d'un compte 
    public function modifier() 
    {
        $sql = "UPDATE compte SET nom = :nom, prenom = :prenom, email = :email, motPasse = :motPasse, tel = :tel WHERE id_compte = :id_compte"; 
        $stmt = $this->conn->prepare($sql); 

        $stmt->bindParam(':nom', $this->nom); 
        $stmt->bindParam(':prenom', $this->prenom); 
        $stmt->bindParam(':email', $this->email); 
        $stmt->bindParam(':motPasse', $this->motPasse); 
        $stmt->bindParam(':tel', $this->tel); 
        $stmt->bindParam(':id_compte', $this->id_compte); 

        if($stmt->execute()) {
            return true; 
        } 
        else {
            return false; 
        }
    }

    // Suppression d'un compte 
    public function supprimer() 
    {
        $sql = "DELETE FROM compte WHERE id_compte = :id_compte"; 
        $stmt = $this->conn->prepare($sql); 

        $stmt->bindParam(':id_compte', $this->id_compte); 

        if($stmt->execute()) {
            return true; 
        } 
        else {
            return false; 
        }
    }

    public function authentification() 
    {
        $sql = "SELECT * FROM compte WHERE email = :email AND motPasse = :motPasse"; 
        $stmt = $this->conn->prepare($sql); 

        $stmt->bindParam(':email', $this->email); 
        $stmt->bindParam(':motPasse', $this->motPasse); 

        $stmt->execute();
        $compte = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($compte) 
        {
            return $compte; 
        }
        return null; 
    }

    public function recupererDernierId() 
    {
        $sql = "SELECT MAX(id_compte) AS id_compte FROM compte"; 
        $stmt = $this->conn->prepare($sql); 
        $stmt->execute(); 
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res[0]['id_compte']; 
    }
}

?>