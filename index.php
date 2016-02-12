<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=challenge_ajax;charset=utf8', 'adminsql', 'mdpsql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
        <link rel="stylesheet" href="ajax.css">

    </head>

    <body>


        <h1>Challenge AJAX Simplon Boulogne Sur Mer</h1>
        <div class="container">
            <div class="row">

                <div id="modal">

                    <div>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            Ajouter un nouveau client
                        </button>

                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Veuillez entrer les informations du client.</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="ajout.php">
                                        <label for="prenom">Prénom :</label>
                                        <input type="text" name="prenom" id="prenom">

                                        <label for="nom">Nom :</label>
                                        <input type="text" name="nom" id="nom">
                                        <br>
                                        <br>
                                        <label for="age"> Age :</label>
                                        <input type="text" name="age" id="age">
                                        <br>
                                        <br>
                                        <label for="profession"> Profession :</label>
                                        <input type="text" name="profession" id="profession">
                                        <br>
                                        <br>
                                        <label for="email"> E-mail :</label>
                                        <input type="text" name="email" id="email">

                                        <label for="tel"> Téléphone :</label>
                                        <input type="text" name="tel" id="tel">
                                        </br>


                                        </div>
                                        <div class="modal-footer" style="clear:both">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                <div> 
                    <label for="client">Selectionnez un client : </label>
                    <select onchange="ajax(this.value)" name="client" id="client">
                        <option selected> -- </option>
                        <option value="all">Tout</option>

                        <?php
                        $sql = 'SELECT * FROM clients ORDER BY id';

                        $challenge = $bdd->query($sql);

                        while ($donnees = $challenge->fetch()) {
                            echo '<option value=' . $donnees['id'] . '>' . $donnees['prenom'] . ' ' . $donnees['nom'] . '</option>';
                        }
                        ?>

                    </select>

                </div>


            </div>
        </div>


        <div>
            <div clas="container">
                <div class="row">
                    <div id="table_client" class="col-xs-10 col-sm-10  col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                        <table id="clients" class="table table-striped hover"> </table>
                    </div>
                </div>
            </div>
        </div>
        <script>

            function ajax(valuelem) {
                xhr = new XMLHttpRequest();
                console.log(valuelem);
                var valuelem = "id=" + valuelem;
                xhr.open('POST', 'traitement.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.send(valuelem);

                if (valuelem === "") {
                    console.log('y\'as rin qui marche gros!');
                    document.getElementById("clients").innerHTML = "";
                    return;
                } else {
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            console.log(xhr.readystate);
                            console.log(valuelem);
                            document.getElementById('clients').innerHTML = xhr.responseText;
                        }
                    };

                }
            }
        </script>    

        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
    </body>
</html>