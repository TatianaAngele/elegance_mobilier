<?php
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/client/rapport_stock.css" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <script src="../js/chart.js"></script>
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
                    <a class="nav-link" href="ajouter_produit.php"> <i class="fa fa-plus-square"></i> Ajouter des produits </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="produit_vendu.php"> <i class="fa fa-money-bill-wave"></i> Produit vendu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#"> <i class="fa fa-chart-line"></i> Rapport de stock</a>
                </li>


            </ul>
        </div>
    </nav>
    
    <main>
        <h2 class="text-center">Rapport de stock </h2>


        <?php 
            include_once('../../controller/produits/rapport_stock.php'); 
            $produit->setId_vendeur($_SESSION['id_compte']); // id vendeur 
            $p = $produit->rapport_stock(); 

            $nom_prod = '['; 
            $quantite = '['; 

            // Formatage des données sous forme de tableau JavaScript : 
            for($i = 0; $i < count($p); $i++) 
            {
                $nom_prod .= "'" . $p[$i]['nom_produit'] . "'"; 
                $quantite .= "'" . $p[$i]['quantite'] . "'";

                if($i != (count($p) -1))
                {
                    $nom_prod .= ", "; 
                    $quantite .= ", "; 
                }
            } 

            // On place le crochet de fermeture (pour un tableau JavaScript)
            $nom_prod .= "]"; 
            $quantite .= "]"; 
        ?>

        <canvas id="myChart" width="200" height="100"></canvas>
    </main>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $nom_prod; ?>,
            datasets: [
            {
                label: 'Rapport de stock',
                data: <?php echo $quantite; ?>,
                borderColor: '#6cb4ee',
                backgroundColor: '#6cb4ee',
                tension: 0.4,
            },
            ],
        },
        options: {
            responsive: true,
            plugins: {
            legend: {
                display: true,
            },
            },
            scales: {
            x: {
                beginAtZero: true,
            },
            y: {
                beginAtZero: true,
            },
            },
        },
        });
    </script>
   
</body>