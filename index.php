<?php
    require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <header>
    <?php include('topheader.php');?>
    </header>

    <main>
        
      <section>
        <div class="container-fluid mt-5">
          <div class="row">
            <div class="col-md-12">
              <div class="demo-box mt-2">
                    <div class="mb-2">
                      <a  href="register.php">
                      <button id="addToTable" class="btn btn-danger waves-effect waves-light">Ajouter <i class="mdi mdi-plus-circle-outline" ></i></button>
                      </a>
                    </div>

                <div class="table-responsive">
                  <table class="table caption-top table-striped table-hover">
                  <caption><h4>Liste de présence</h4></caption>
                    <thead class="bg-dark text-light">
                      <tr>
                        <th class="col-sm-1">Id</th>
                        <th class="col-sm-2">Nom</th>
                        <th class="col-sm-2">Prénom</th>
                        <th class="col-sm-2">Numéro</th>
                        <th class="col-sm-2">Adresse E-mail</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                          $db = Database::connect();
                          $statement = $db->query('SELECT * FROM tb_simplonregister ');
                          while($item = $statement->fetch()) 
                          {
                              echo '<tr>';
                              echo '<td>'. $item['Id'] . '</td>';
                              echo '<td>'. $item['nom'] . '</td>';
                              echo '<td>'. $item['prenom'] . '</td>';
                              echo '<td>'. $item['numero'] . '</td>';
                              echo '<td>'. $item['email'] . '</td>';
                          }
                          Database::disconnect();
                        ?>
                    </tbody>
                 </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer>

    </footer>
</body>
</html>