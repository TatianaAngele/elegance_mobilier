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
    <title>Liste des produits acheté</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="liste_produit.php"> <i class="fa fa-list"></i> Liste des produits <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="produit_achete.php"> <i class="fa fa-shopping-bag"></i> Produit achété.</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"> <i class="fa fa-user-edit"></i> Information du compte</a>
                </li>
            </ul>

            <form class="form-inline d-flex my-2 my-lg-0" method="GET" action="../../controller/produits/rechercher.php">
                <input class="form-control me-2" type="search" placeholder="Trouver un produit" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Trouver</button>
            </form>

        </div>
    </nav>

    <div>
        <h1 class="text-center">Information du compte</h1>

        <div style="margin-left: 50px;">
            <p>Nom : <?php echo $_SESSION['nom'] ?></p>
            <p>Prénom : <?php echo $_SESSION['prenom'] ?></p>
            <p>Email : <?php echo $_SESSION['email'] ?></p>
            <p>Tél : <?php echo $_SESSION['tel'] ?></p>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"> <i class="fa fa-pen"></i> Modifier</button>
        </div>
        
    </div>

    <!-- Modal pour modifier un compte -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modification d'un compte</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form class="form" method="POST" action="../../controller/compte/modifier.php">
                <div class="mt-2">
                        <label class="form-label">Nom: </label> 
                        <input type="text" name="nom"  class="form-control"/>
                </div>

                <div class="mt-2">
                        <label class="form-label">Prenom: </label> 
                        <input type="text" name="prenom" class="form-control" />
                </div>

                <div class="mt-2">
                        <label class="form-label">Email: </label> 
                        <input type="text" name="email" class="form-control" />
                </div>

                <div class="mt-2">
                        <label class="form-label">Telephone: </label> 
                        <input type="text" name="tel" class="form-control" />
                </div>

                <div class="mt-2">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-pen"></i> Modifier</button>
                </div>
            
            </form>
      </div>
    </div>
  </div>
</div>

     <!-- Chargement du script Bootstrap bundle -->
     <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body