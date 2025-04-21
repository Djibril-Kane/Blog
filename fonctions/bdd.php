<?php
function bdd() {
    try {
        $bdd = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
    }
    catch(PDOException $e) {
        echo 'Connexion echoue : ' . $e->getMessage();
    }
    return $bdd; // on le retourne pour qu il soit contenu dans la variable bdd globale
}

    
