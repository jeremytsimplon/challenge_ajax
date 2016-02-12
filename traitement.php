<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=challenge_ajax;charset=utf8', 'adminsql', 'mdpsql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idClient = $_POST['id'];



echo "<thead>"
 . "<tr>"
 . "<th>Prenom</th>"
 . "<th>Nom</th>"
 . "<th>Age</th>"
 . "<th>Profession</th>"
 . "<th>Email</th>"
 . "<th>Téléphone</th>"
 . "</tr>"
 . "</thead>"
 . "<tbody>"
;




if ($idClient !== "all") {
    $sqlajax = 'SELECT * FROM clients WHERE id='. $idClient;
    $resajax = $bdd->query($sqlajax);
    while ($donnees = $resajax->fetch()) {
        echo '<tr>'
        . '<td>' . $donnees['prenom'] . '</td>'
        . '<td>' . $donnees['nom'] . '</td>'
        . '<td>' . $donnees['age'] . '</td>'
        . '<td>' . $donnees['profession'] . '</td>'
        . '<td>' . $donnees['email'] . '</td>'
        . '<td>0' . $donnees['telephone'] . '</td>'
        . '</tr>';
    }
} else {

    $resajax = $bdd->query('SELECT * FROM clients ORDER BY prenom ');

    while ($donnees = $resajax->fetch()) {
        echo '<tr>'
        . '<td>' . $donnees['prenom'] . '</td>'
        . '<td>' . $donnees['nom'] . '</td>'
        . '<td>' . $donnees['age'] . '</td>'
        . '<td>' . $donnees['profession'] . '</td>'
        . '<td>' . $donnees['email'] . '</td>'
        . '<td>0' . $donnees['telephone'] . '</td>'
        . '</tr>';
    }
};


echo '</tbody>';






/* while($donnees = $resajax->fetch()) {
  echo '<p> prenom : ' . $donnees['prenom'] . '</br>nom : ' . $donnees['nom'] . '</br>age : ' . $donnees['age'] . '</br> profession : ' . $donnees['profession'] . '</br>email : ' . $donnees['email'] . '</br> telephone : ' . $donnees['telephone'] . '</br></p>';
  };
 */
?>