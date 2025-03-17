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
            <i class="fa fa-couch"></i> Elegance Mobilier
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
                    <a class="nav-link active" href="#"> <i class="fa fa-boxes"></i> Mes produits <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="ajouter_produit.php"> <i class="fa fa-plus-square"></i> Ajouter des produits </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="produit_vendu.php"> <i class="fa fa-money-bill-wave"></i> Produit vendu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="rapport_stock.php"> <i class="fa fa-chart-line"></i> Rapport de stock</a>
                </li>
            </ul>
        </div>
    </nav>


    <div>
        <h1 class="text-center">Liste de mes produits</h1>

        <?php 
            include_once('../../controller/produits/liste_produit_vendeur.php'); 
            $produit = new Produit($conn); 

            // mettre l'id du vendeur dans l'objet produit 
            $produit->setId_vendeur($_SESSION['id_compte']); 
            $p = $produit->liste_produit_vendeur(); 
        ?>

        <?php if($p): ?>
            <div class="container">
                <div class="row">
                    <?php for ($i = 0; $i < count($p); $i++): ?>
                        <div class="col-md-4 mb-4 d-flex">
                            <div class="card h-100 " style="width: 300px !important;"> <!-- Utilisation de h-100 pour garantir que toutes les cartes ont la même hauteur -->
                                <img class="card-img-top" src="../assets/uploads/<?php echo $p[$i]['photo'] ?>" alt="Card image" style="object-fit: cover; height: 200px;">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title"><?php echo $p[$i]['nom_produit'] ?></h4>
                                    <p class="card-text">Prix : <?php echo $p[$i]['prix'] ?></p>
                                    <p class="card-text">Quantité en stock : <?php echo $p[$i]['quantite'] ?></p>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifierProduit<?php echo $p[$i]['id_produit'] ?>"> <i class="fa fa-edit"></i> Modifier</button>
                                    <button class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#supprimerProduit"> <i class="fa fa-trash"></i> Supprimer</button>

                                    <!-- Modal pour modifier le produit -->
                                    <div class="modal fade" id="modifierProduit<?php echo $p[$i]['id_produit'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title"> <i class="fa fa-edit"></i> Modification du produit </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" action="../../controller/produits/modifier.php">
                                                    <input type="hidden" name="id_produit" value="<?php echo $p[$i]['id_produit'] ?>" />
                                                    <input type="hidden" name="photo" value="<?php echo $p[$i]['photo'] ?>" />

                                                    <div>
                                                        <label class="form-label">Nom du produit</label>
                                                        <input type="text" name="nom_produit" class="form-control" value="<?php echo $p[$i]['nom_produit'] ?>" />
                                                    </div>

                                                    <div>
                                                        <label class="form-label">Prix</label>
                                                        <input type="text" name="prix" class="form-control" value="<?php echo $p[$i]['prix'] ?>"/>
                                                    </div>
                                                    
                                                    <div>
                                                        <label for="form-label">Quantité</label>
                                                        <input type="text" name="quantite" class="form-control" value="<?php echo $p[$i]['quantite'] ?>"/>
                                                    </div>

                                                    <button class="btn btn-primary mt-2"> <i class="fa fa-check"></i> Modifier le produit</button>
                                                </form>
                                            </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal pour supprimer le produit --> 
                                    <div class="modal" id="supprimerProduit">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title text-danger"> <i class="fa fa-trash"></i> Confirmation de suppression </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Voulez vous vraimment supprimer ce produit ? 

                                                <div class="mt-2">
                                                    <a href="../../controller/produits/supprimer.php?id_produit=<?php echo $p[$i]['id_produit'] ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> Oui</a>
                                                    <button href="#" class="btn btn-success" data-bs-dismiss="modal"> <i class="fa fa-times"></i> Non</button>
                                                </div>
                                            </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>
            </div>
        <?php else:  ?>
            <p class="text-center">Aucun produit</p>
        <?php endif ?>
    </div>

    <!-- Chargement du script Bootstrap bundle -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
