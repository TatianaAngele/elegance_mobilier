<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="css/creer_compte.css" />
    <title>Création d'un compte</title>
</head>
<body>
    <div class="d-flex justify-content-between entete">
        <div>
            <i class="fa fa-couch"></i> Elegence Mobilier
        </div>

        <div>
            <a class="btn" href="se_connecter.php"> <i class="fa fa-user-plus"></i> Se connecter</a>
        </div>
    </div>

    <form class="form" method="POST" action="../controller/compte/creer_compte.php">
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
            <label class="form-label">Mot de passe: </label> 
            <input type="password" name="motPasse" class="form-control" />
       </div>

       <div class="mt-2">
            <label class="form-label">Telephone: </label> 
            <input type="text" name="tel" class="form-control" />
       </div>

       <div>
            <label for="role">Role : </label>
            <select name="role" id="role" class="form-control">
                <option value="client">Client</option>
                <option value="vendeur">Vendeur</option>
            </select>
       </div>


       <div class="mt-2">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-user-plus"></i> Créer un compte</button>
       </div>
       
    </form>
</body>
</html>