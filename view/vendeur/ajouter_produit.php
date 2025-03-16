<?php
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/client/liste_produit.css" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <title>Liste des produits</title>
</head>
<body>
    <div class="d-flex justify-content-between entete">
        <div>
            <i class="fa fa-couch"></i> Elegence Mobilier
        </div>

        <div>
            <a class="btn" href="../deconnexion.php"> <i class="fa fa-sign-out-alt"></i> Déconnexion</a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="liste_produit.php"> <i class="fa fa-boxes"></i> Mes produits <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"> <i class="fa fa-plus-square"></i> Ajouter des produits </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="produit_vendu.php"> <i class="fa fa-money-bill-wave"></i> Produit vendu</a>
                </li>
            </ul>
        </div>
    </nav>


    <div>
        <h1 class="text-center">Ajout d'un produit</h1>

        <?php 
            include_once('../../controller/produits/liste_produit_vendeur.php'); 
            $produit = new Produit($conn); 

            // mettre l'id du vendeur dans l'objet produit 
            $produit->setId_vendeur($_SESSION['id_compte']); 
            $p = $produit->liste_produit_vendeur(); 
        ?>

        <form class="container" enctype="multipart/form-data" method="POST" action="../../controller/produits/ajouter.php">
            <input type="hidden" name="id_vendeur" value="<?php echo $_SESSION['id_compte'] ?>" />
        
            <div>
                <label class="form-label">Nom du produit : </label>
                <input type="text" name="nom_produit" class="form-control">
            </div>

            <div>
                <label class="form-label">Prix</label>
                <input type="text" name="prix" class="form-control">
            </div>

            <div>
                <label class="form-label">Photo du produit : </label>
                <input type="file" name="photo" class="form-control" />
            </div>

            <div>
                <label class="form-label">Quantité : </label>
                <input type="text" name="quantite" class="form-control">
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Ajouter    
                </button>
            </div>
        </form>

    <!-- Chargement du script Bootstrap bundle -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
