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
    <title>Résultat</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="liste_produit.php"> <i class="fa fa-list"></i> Liste des produits <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="produit_achete.php"> <i class="fa fa-shopping-bag"></i> Produit achété.</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="info_compte.php"> <i class="fa fa-user-edit"></i> Information du compte</a>
                </li>
            </ul>

            <form class="form-inline d-flex my-2 my-lg-0" method="GET" action="../../controller/produits/rechercher.php">
                <input class="form-control me-2" type="search" placeholder="Trouver un produit" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Trouver</button>
            </form>

        </div>
    </nav>


    <div>
        <h1 class="text-center">Résultat de recherche</h1>

        <?php if(isset($_SESSION['produit_trouve'])): ?>
            
            <div class="container">
                <div class="row">
                    <?php for ($i = 0; $i < count($_SESSION['produit_trouve']); $i++): ?>
                        <div class="col-md-4 mb-4 d-flex">
                            <div class="card h-100"> <!-- Utilisation de h-100 pour garantir que toutes les cartes ont la même hauteur -->
                                <img class="card-img-top" src="../assets/uploads/<?php echo $_SESSION['produit_trouve'][$i]['photo'] ?>" alt="Card image" style="object-fit: cover; height: 200px;">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title"><?php echo $_SESSION['produit_trouve'][$i]['nom_produit'] ?></h4>
                                    <p class="card-text">Prix : <?php echo $_SESSION['produit_trouve'][$i]['prix'] ?></p>
                                    <p class="card-text">Quantité en stock : <?php echo $_SESSION['produit_trouve'][$i]['quantite'] ?></p>
                                    <a href="../../controller/vente/ajouter.php?id_produit=<?php echo $_SESSION['produit_trouve'][$i]['id_produit'] ?>" class="btn btn-primary mt-auto">  <i class="fa fa-cart-plus"></i> Acheter</a> <!-- Ajout de mt-auto pour pousser le bouton en bas -->
                                </div>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>
            </div>
            
            <?php unset($_SESSION['produit_trouve']); ?>
        <?php else: ?>
            <p class="text-center">Aucun produit n'a été trouve pour votre recherche.</p>
        <?php endif ?>

        
    </div>

    <!-- Chargement du script Bootstrap bundle -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
