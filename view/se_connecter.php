<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="css/se_connecter.css" />
    <title>Se connecter</title>
</head>
<body>
    <div class="d-flex justify-content-between entete">
        <div>
            <i class="fa fa-couch"></i> Elegance Mobilier
        </div>

        <div>
            <a class="btn" href="creer_compte.php"> <i class="fa fa-user-plus"></i> Créer un compte</a>
        </div>
    </div>

    <form class="form" method="POST" action="../controller/compte/authentification.php">
       <div class="mt-2">
            <label class="form-label">Adresse email : </label> 
            <input type="text" name="email"  class="form-control"/>
       </div>

       <div class="mt-2">
            <label class="form-label">Mot de passe : </label> 
            <input type="password" name="motPasse" class="form-control" />
       </div>

       <div class="mt-2">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-user"></i> Se connecter</button>
       </div>
       
    </form>
</body>
</html>