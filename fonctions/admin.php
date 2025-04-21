<?php
function poster() {
    global $bdd;
    extract($_POST);
    $validation = true;
    $erreurs = [];

    if (empty($titre) || empty($contenu)) {
        $validation = false;
        $erreurs[] = "Tous les champs doivent etre remplis";

    }

    if (!isset($_FILES["file"]) OR ($_FILES["file"]["error"] > 0)) {
        $validation = false;
        $erreurs[] = "Il faut indiquer un fichier";
    }

    if ($validation) {
        $image = basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], '../img/' . $image);
        $poster = $bdd->prepare("INSERT INTO articles(titre, accroche, contenu, image) VALUES(:titre, :accroche, :contenu, :image) ");
        $poster->execute([
            "titre"=> htmlentities($titre),
            "accroche"=> substr(htmlentities($contenu), 0, 200),
            "contenu"=> htmlentities($contenu),
            "image"=> htmlentities($image),
        ]);
        unset($_POST["titre"]);
        unset($_POST["contenu"]);
    }
    return $erreurs;
}
function post() {
    global $bdd;


    $posts = $bdd->query("SELECT id, titre FROM articles ORDER BY id DESC");
    $posts = $posts->fetchAll();


    return $posts;
}
function postti() {
    global $bdd;
    $id = (int)$_GET["id"];
    
    $posteri = $bdd->prepare("SELECT titre, contenu FROM articles WHERE id = ?");
    $posteri->execute([$id]);
    $posteri = $posteri->fetch();

    return $posteri;
}
function supprimer() {
    global $bdd;
    $id = (int)$_GET["id"];

    $image = $bdd->prepare("SELECT image FROM articles WHERE id = ?");
    $image->execute([$id]);
    $image = $image->fetch()["image"];

    unlink('../img/' . $image);

    $supp = $bdd->prepare("DELETE FROM articles WHERE id = ?");
    $supp->execute([$id]);

    return $supp;
}
function modiff() {
    global $bdd;
    $id = (int)$_GET["id"];
    extract($_POST);
    $erreur = "";

    if (!empty($titre) AND !empty($contenu)) {
        $modifier = $bdd->prepare("UPDATE articles SET titre = :titre, accroche = :accroche, contenu = :contenu WHERE id = :id");
        $modifier->execute([
            "id"=> $id,
            "titre"=> htmlentities($titre),
            "accroche"=> substr(htmlentities($contenu), 0, 200),
            "contenu"=> htmlentities($contenu),
        ]);
        unset($_POST["titre"]);
        unset($_POST["accroche"]);
        unset($_POST["contenu"]);
    }
    else {
        $erreur .= "Les champs doivent contenir quelque chose";
    }

    return $erreur;
}

