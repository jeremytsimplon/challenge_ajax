<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=challenge_ajax;charset=utf8', 'adminsql', 'mdpsql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


if (!EMPTY($_POST['nom']) && !EMPTY($_POST['prenom']) && !EMPTY($_POST['age']) && !EMPTY($_POST['profession']) && !EMPTY($_POST['email']) && !EMPTY($_POST['telephone'])) {

    var_dump($_POST);
} else {
    
    echo '<h1 onload=redirection()> <strong> Veuillez Renseigner tous les champs! </strong> </h1>';
}

?> <script>
    function redirection() {
        <?php
    sleep(3);
    header('location:index.php')
        ?>
    }
</script>




