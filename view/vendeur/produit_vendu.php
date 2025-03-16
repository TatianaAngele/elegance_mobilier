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
    <title>Produits vendu</title>
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
                    <a class="nav-link" href="ajouter_produit.php"> <i class="fa fa-plus-square"></i> Ajouter des produits </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="info_compte.php"> <i class="fa fa-money-bill-wave"></i> Produit vendu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="rapport_stock.php"> <i class="fa fa-chart-line"></i> Rapport de stock</a>
                </li>
            </ul>
        </div>
    </nav>


    <div>
        <h1 class="text-center">Liste des produits vendus</h1>

        <?php
            include_once('../../controller/vente/liste_vente_vendeur.php'); 
        ?>

        <?php if($v): ?>
            <table class="table">
                <tr>
                    <td>Nom du produit</td>
                    <td>Prix</td>
                    <td>Date d'achat</td>
                    <td>Nom du client</td>
                    <td>Prénom du client</td>
                </tr>

                <?php for($i = 0; $i < count($v); $i++): ?>
                    <tr>
                        <td><?php echo $v[$i]['nom_produit'] ?></td>
                        <td><?php echo $v[$i]['prix'] ?></td>
                        <td><?php echo $v[$i]['date_vente'] ?></td>
                        <td><?php echo $v[$i]['nom_client'] ?></td>
                        <td><?php echo $v[$i]['prenom_client'] ?></td>
                    </tr>
                <?php endfor ?>
            </table>
        <?php else: ?>
            <p>Aucun de vos produit n'a été vendu.</p>
        <?php endif ?>

    <!-- Chargement du script Bootstrap bundle -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
