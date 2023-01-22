<?php
require 'config.php';
 
    $nom = $prenom = $numero = $email = $nomError = $prenomError = $numeroError = $emailError = $emailExist = $success ="";

    if(!empty($_POST)) 
    {
        $nom                = checkInput($_POST['nom']);
        $prenom             = checkInput($_POST['prenom']);
        $numero             = checkInput($_POST['numero']);
        $email              = checkInput($_POST['email']); 
        $isSuccess          = true;
        
        if(empty($nom)) 
        {
            $nomError = '<div class=" text-danger">Ce champ ne peut pas être vide</div>';
            $isSuccess = false;
        }
        if(empty($prenom)) 
        {
            $prenomError = '<div class=" text-danger">Ce champ ne peut pas être vide</div>';
            $isSuccess = false;
        }
        if(empty($numero)) 
        {
            $numeroError = '<div class=" text-danger">Ce champ ne peut pas être vide</div>';
            $isSuccess = false;
        }
        if(empty($email)) 
        {
            $emailError = '<div class=" text-danger">Ce champ ne peut pas être vide</div>';
            $isSuccess = false;
        }
       
        if($isSuccess) 
        {
            $db = Database::connect();

            $statement = $db->prepare('SELECT EXISTS (SELECT * FROM tb_simplonregister WHERE email = :email)');
            $statement->execute(array(':email' => $email));
            $result = $statement->fetchColumn();
            if ($result == 1) {
                $emailExist = '<div class=" text-danger">Cet adresse email existe déja</div> ';
            }else {

            $statement = $db->prepare("INSERT INTO tb_simplonregister
            (nom,prenom,numero,email)
             values(?, ?, ?, ?)");
            $statement->execute(array
            ($nom,$prenom,$numero,$email));
            Database::disconnect();
            header("Location:");
            $success = '<div class="">Enregitrement effectué avec succès</div> ';
            }
        }
    }
    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="">
    
     <title>formulaire de presence</title>
     <style>
        #img-bg{
            background-image:url(https://scolarite.uvci.edu.ci/assets/assets2/images/fond.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            -webkit-background-size: cover;
            background-origin: initial;
            background-position-x: 50%;
            background-position-y: 50%;
        }
        body{
            background-color: #f3f3f3;
            font-family: "Open Sans", sans-serif, verdana;
            margin: auto;
            color: #292b2c;
            display: block;
        }
     </style>
</head>
<body id="img-bg">
  <section class="d-flex justufy-content-center">
    <div class="container-fluid">
        <div class="row d-flex  m-2  d-flex justify-content-center">

          <div class=" col-sm-4 shadow p-3 mb-5 bg-body rounded">
              <div class="">
                <div class=" mb-5 mt-3 text-center">
                <h3 class="d-flex justify-content-center ">Formulaire de présence</h3>
                <img src="images/téléchargement.png" width=" 150px" class="col-sm-4 mt-4" alt="">
                </div>
                <form action="" method="post" class="">
                <span class="help-inline"><?php echo $success;?></span>
                  <div class="mb-4 form-group">
                    <input type="text" class="form-control"  name="nom" id="inputNom" placeholder="Nom">
                    <span class="help-inline"><?php echo $nomError;?></span>
                  </div>

                  <div class="mb-4 form-group">
                    <input type="Prenom" class="form-control"  name="prenom" id="inputPrenom" placeholder="Prenom">
                    <span class="help-inline"><?php echo $prenomError;?></span>
                  </div>

                  <div class="mb-4 form-group">
                    <input type="Number" class="form-control"  name="numero" id="inputNumero" placeholder="Numero de téléphone">
                    <span class="help-inline"><?php echo $numeroError;?></span>
                  </div>

                  <div class="mb-4 form-group">
                    <input type="email" class="form-control"  name="email" id="Email" placeholder="Adresse E-mail">
                    <span class="help-inline"><?php echo $emailError;?></span>
                    <span class="help-inline"><?php echo $emailExist;?></span>
                  </div>
                  <a class="nav-link" href="index.php"><strong class="text-danger">Voir la liste</strong></a>
                  <div class="form-group mb-5 mt-4">
                    <button type="submit" class="btn btn-danger form-control">Enregistré</button>
                  </div>
                </form>
                <hr>
                <footer class="mt-4 mb-4">
                  <small>Copyright © 2023 (Tous droits réservés)</small><br>
                  <small class="text-danger"><strong>Simplon côte d'Ivoire</strong></small>
                </footer>
              </div>
          </div>
        </div>
    </div>
  </section>
</body>
</html>